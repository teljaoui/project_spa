<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Horaire;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SpaController extends Controller
{
    public function home()
    {
        $services = Service::all();
        return view('home', compact('services'));
    }
    public function index()
    {
        $times = Horaire::all();
        $clients = Client::all();
        $reservations = Reservation::with(['horaire', 'client'])
            ->whereDate('reservation', '=', Carbon::today()->toDateString())
            ->orderBy("time_id")->get();
        return view('admin/index', compact('clients', 'times', 'reservations'));
    }
    public function searchphone(Request $request)
    {
        $phone_number = $request->phone_number;
        $client = Client::where("phone_number", $phone_number)->first();

        $clients = Client::all();
        $times = Horaire::all();

        if ($client) {
            $reservations = Reservation::with(['horaire', 'client'])
                ->where('user_id', $client->id)
                ->get();
            if ($reservations->isNotEmpty()) {
                return view('admin.index', compact('clients', 'times', 'reservations'));
            } else {
                return redirect('admin/index')->with('error', 'Aucune réservation trouvée pour ce client');
            }
        } else {
            return redirect('admin/index')->with('error', 'Aucun client trouvé avec ce numéro de téléphone');
        }
    }

    public function searchdate(Request $request)
    {
        $date = $request->date_reserv;
        $times = Horaire::all();
        $clients = Client::all();

        $reservations = Reservation::with(['horaire', 'client'])->whereDate('reservation', '=', $date)->get();

        if ($reservations->isEmpty()) {
            return redirect('admin/index')->with('error', 'Aucune réservation trouvée pour cette date');
        } else {
            return view('admin.index', compact('clients', 'times', 'reservations'));
        }
    }

    public function reservation($id)
    {
        $times = Horaire::all();
        $clients = Client::all();
        $reservation = Reservation::with(['horaire', 'client'])->findOrFail($id);

        return view('admin/details', compact('reservation', 'times', 'clients'));
    }
    public function deletereservation($id)
    {
        try {
            $reservation = Reservation::find($id);
            if ($reservation) {
                $reservation->delete();
                session()->flash('success', 'Réservation supprimée avec succès');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Erreur de suppression de la réservation :' . $e->getMessage());
        }
        return redirect('admin/index');
    }

    public function past()
    {
        $times = Horaire::all();
        $clients = Client::all();
        $reservations = Reservation::with(['horaire', 'client'])
            ->whereDate('reservation', '<', Carbon::today()->toDateString())
            ->orderBy("time_id")->get();
        return view('admin/past', compact('clients', 'times', 'reservations'));
    }
    public function deleteAll()
    {

        try {
            $reservations = Reservation::with(['horaire', 'client'])
                ->whereDate('reservation', '<', Carbon::today()->toDateString());
            if ($reservations) {
                $reservations->delete();
                session()->flash('success', 'Réservation supprimée avec succès.');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Erreur de suppression de la réservation : ' . $e->getMessage());
        }
        return redirect('admin/index');
    }
    function loginPost(Request $request)
    {
        $user = User::where('email', '=', 'admin')->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('/admin/index')->with("success", "Bienvenue de retour Admin, la connexion a réussi.");
            } else {
                return back()->withErrors(
                    [
                        'email' => "Email ou mot de passe incorrect."
                    ]
                )->onlyInput('email');
            }
        } else {
            return back()->withErrors([
                'email' => "Email introuvable"
            ])->withInput();
        }
    }
    public function logout()
    {
        if (
            Session::has('loginId')
            || Session::has('date')
            || Session::has('time')
            || Session::has('firstname')
            || Session::has('lastname')
            || Session::has('phone_number')
            || Session::has('user')
        ) {
            Session::pull('loginId');
            Session::pull('date');
            Session::pull('time');
            Session::pull('firstname');
            Session::pull('lastname');
            Session::pull('phone_number');
            Session::pull('user');
            return redirect('/admin/login')->with('success', 'Vous avez été déconnecté avec succès.');
        }
        return redirect('/admin/login');
    }
    public function updatePost(Request $request)
    {
        $user = User::where("email", "=", "admin")->first();

        $password = $request->password;
        $password_confirme = $request->password_confirme;

        if ($password === $password_confirme) {
            $user->update(
                [
                    'password' => Hash::make($request->password)
                ]
            );
            session()->flash('success', 'Mot de passe modifié avec succès.');
        } else {
            session()->flash('error', 'Les mots de passe ne correspondent pas.');
        }
        return redirect('/admin/updatepassword');
    }
    public function management()
    {
        $services = Service::all();
        $times = collect(); 
    
        if (session('getservice')) {
            $times = Horaire::where('id_service', '=', session('getservice'))->orderBy('time', 'asc')->get();
        }
    
        return view('admin.management', compact('times', 'services'));
    }
    public function getservice(Request $request)
    {
        $times = Horaire::where('id_service', '=', $request->service)->get();
        $services = Service::all();

        if ($times->count() > 0) {
            $request->session()->put('getservice', $request->service);
        } else {
            session()->flash('error', 'Aucun horaire disponible pour ce service.');
        }

        return view('admin.management', compact('times', 'services'));
    }public function timePost(Request $request)
    {
        try {
            if (session()->has('getservice')) {
                Horaire::create([
                    'time' => $request->time,
                    'id_service' => session()->get('getservice'),
                ]);
    
                session()->flash('success', 'Heure ajoutée avec succès.');
            } else {
                session()->flash('error', 'Aucun service sélectionné. Veuillez d\'abord sélectionner un service.');
            }
        } catch (\Exception $e) {
            session()->flash('error', "Erreur lors de l'ajout de l'heure : " . $e->getMessage());
        }
    
        return redirect('/admin/management');
    }
    
    public function timdelete(Request $request)
    {
        try {
            $tim = Horaire::find($request->id);
            if ($tim) {
                $tim->delete();
                session()->flash('success', 'Heure supprimée avec succès.');
            }
        } catch (\Exception $e) {
            session()->flash('error', "Erreur lors de l'ajout de l'heure :" . $e->getMessage());
        }
        return redirect('admin/management');
    }
    public function addPost(Request $request)
    {
        $date_reserve = $request->date_reserve;

        if ($date_reserve < Carbon::today()->toDateString()) {
            return redirect('/admin/add')->with('error', 'La date saisie est dans le passé. Veuillez sélectionner une date valide.');
        }

        $request->session()->put('date', $date_reserve);

        $all_times = Horaire::orderBy("time")->get();

        $reserved_times = Reservation::where('reservation', $date_reserve)->pluck('time_id');

        $available_times = $all_times->filter(function ($time) use ($reserved_times) {
            return !$reserved_times->contains($time->id);
        });

        return view('admin.add', ['times' => $available_times]);
    }

    public function backtime()
    {
        if (Session::has('date')) {
            Session::pull('date');
        }
        return redirect('/admin/add');
    }
    public function addtime(Request $request)
    {
        $request->validate([
            'time' => 'required|exists:horaires,id',
        ]);

        $time = Horaire::where('id', $request->time)->value('time');
        $time_id = Horaire::where('id', $request->time)->value('id');
        $request->session()->put('time', $time);
        $request->session()->put('time_id', $time_id);

        return redirect('/admin/add')->with('success', 'Heure sélectionnée avec succès !');
    }

    public function backuser(Request $request)
    {
        if ($request->session()->has('time')) {
            $request->session()->forget('time');
        }

        $all_times = Horaire::orderBy('time')->get();

        $reserved_times = Reservation::where('reservation', $request->session()->get('date'))->pluck('time_id');

        $available_times = $all_times->filter(function ($time) use ($reserved_times) {
            return !$reserved_times->contains($time->id);
        });

        return view('admin.add', ['times' => $available_times]);
    }

    public function adduser(Request $request)
    {
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $phone_number = $request->phone_number;

        $request->session()->put('firstname', $firstname);
        $request->session()->put('lastname', $lastname);
        $request->session()->put('phone_number', $phone_number);
        $request->session()->put('user', true);
        return view("admin.add");
    }
    public function backfinal(Request $request)
    {
        if ($request->session()->has('user')) {
            $request->session()->pull('user');
            $request->session()->pull('firstname');
            $request->session()->pull('lastname');
            $request->session()->pull('phone_number');
        }
        return view('admin.add');
    }

    public function confirmed_admin(Request $request)
    {
        $firstname = $request->session()->get('firstname');
        $lastname = $request->session()->get('lastname');
        $phone_number = $request->session()->get('phone_number');
        $date = $request->session()->get('date');
        $time = $request->session()->get('time');
        $user = $request->session()->get('user');
        $time_id = $request->session()->get('time_id');

        if (!$firstname || !$lastname || !$phone_number || !$date || !$time_id) {
            return redirect('/admin/add')->with('error', 'Données de session manquantes. Veuillez réessayer.');
        }

        $client = Client::create([
            'first_name' => $firstname,
            'last_name' => $lastname,
            'phone_number' => $phone_number,
        ]);

        Reservation::create([
            'reservation' => $date,
            'time_id' => $time_id,
            'user_id' => $client->id,
        ]);

        $request->session()->forget(['firstname', 'lastname', 'phone_number', 'date', 'time', 'time_id', 'user']);

        return redirect('/admin/add')->with('success', 'Réservation confirmée avec succès !');
    }


    //*Reservation user

    public function appointmentpost(Request $request)
    {
        $date_reserve = $request->date_reserve;

        if ($date_reserve < Carbon::today()->toDateString()) {
            return redirect('appointment')->with('error', 'La date saisie est dans le passé. Veuillez sélectionner une date valide.');
        }

        $request->session()->put('date_front', $date_reserve);

        $all_times = Horaire::orderBy("time")->get();

        $reserved_times = Reservation::where('reservation', $date_reserve)->pluck('time_id');

        $available_times = $all_times->filter(function ($time) use ($reserved_times) {
            return !$reserved_times->contains($time->id);
        });

        return view('available', ['times' => $available_times]);
    }
    public function backappontment()
    {
        if (Session::has('date')) {
            Session::pull('date');
        }
        return redirect('/appointment');
    }

    public function availablepost(Request $request)
    {
        $request->validate([
            'time' => 'required|exists:horaires,id',
        ]);

        $time = Horaire::where('id', $request->time)->value('time');
        $time_id = Horaire::where('id', $request->time)->value('id');
        $request->session()->put('time_front', $time);
        $request->session()->put('time_front_id', $time_id);

        return view('confirmed');
    }
    public function backconfirmed(Request $request)
    {
        if ($request->session()->has('time_front')) {
            $request->session()->forget('time_front');
        }

        $all_times = Horaire::orderBy('time')->get();

        $reserved_times = Reservation::where('reservation', $request->session()->get('date_front'))->pluck('time_id');

        $available_times = $all_times->filter(function ($time) use ($reserved_times) {
            return !$reserved_times->contains($time->id);
        });

        return view('available', ['times' => $available_times]);
    }

    public function confirmedpost(Request $request)
    {
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $phone_number = $request->phone_number;

        $request->session()->put('firstname_front', $firstname);
        $request->session()->put('lastname_front', $lastname);
        $request->session()->put('phone_front', $phone_number);
        $request->session()->put('user_front', true);
        return view("done");
    }

    public function backdone(Request $request)
    {
        if ($request->session()->has('user_front')) {
            $request->session()->pull('user_front');
            $request->session()->pull('firstname_front');
            $request->session()->pull('lastname_front');
            $request->session()->pull('phone_front');
        }
        return view('confirmed');
    }

    public function donepost(Request $request)
    {
        $firstname = $request->session()->get('firstname_front');
        $lastname = $request->session()->get('lastname_front');
        $phone_number = $request->session()->get('phone_front');
        $date = $request->session()->get('date_front');
        $time = $request->session()->get('time_front');
        $user = $request->session()->get('user_front');
        $time_id = $request->session()->get('time_front_id');

        if (!$firstname || !$lastname || !$phone_number || !$date || !$time_id) {
            return redirect('/appointment')->with('error', 'Données de session manquantes. Veuillez réessayer.');
        }

        $client = Client::create([
            'first_name' => $firstname,
            'last_name' => $lastname,
            'phone_number' => $phone_number,
        ]);

        Reservation::create([
            'reservation' => $date,
            'time_id' => $time_id,
            'user_id' => $client->id,
        ]);

        $request->session()->forget([
            'firstname_front',
            'lastname_front',
            'phone_front',
            'date_front',
            'time_front',
            'time_front_id',
            'user_front'
        ]);

        return redirect('/appointment')->with('success', 'Réservation confirmée avec succès !');
    }



    public function services()
    {
        $services = Service::all();
        return view('admin/service', compact('services'));
    }
    public function addservicepost(Request $request)
    {
        try {
            $designation = str_replace(' ', '_', $request->get('designation'));
            $file_name = uniqid() . "." . $request->file("service_image")->extension();

            $request->file("service_image")->move(public_path('img'), $file_name);

            Service::create([
                'designation' => $designation,
                'service_image' => $file_name,
                'nb_reservation' => $request->nb_reservation
            ]);

            session()->flash('success', 'Service ajoutée avec succès.');
        } catch (\Exception $e) {
            session()->flash('error', 'Une erreur est survenue lors de l\'ajout de service. Assurez-vous de remplir tous les champs et de ne pas répéter les Services.');
        }

        return redirect('/admin/services');
    }

    public function servicedelete($id)
    {
        $service = Service::find($id);
        try {
            if ($service) {
                $service->delete();
            }
            session()->flash('success', 'Service Supprimé avec succès.');
        } catch (\Exception $e) {
            session()->flash('error', 'Une erreur est survenue lors de la suppréssion de service.' . $e);
        }
        return redirect('/admin/services');

    }

}
