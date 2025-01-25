<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SpaController extends Controller
{
    public function index()
    {
        $reservations = Reservation::whereDate('date_visite', '=', Carbon::today()->toDateString())
            ->orderBy("heure_de_visite")->get();
        return view('admin/index', compact('reservations'));
    }
    public function searchphone(Request $request)
    {
        $phone_number = $request->phone_number;
        $reservations = Reservation::where("phone_number", "=", $phone_number)->get();
        $title = "Résultat de la recherche";
        if ($reservations->isNotEmpty()) {
            return view('admin.index', compact('reservations' , 'title'));
        } else {
            return redirect('admin/index')->with('error', 'Aucune réservation trouvée pour ce client');
        }
    }

    public function searchdate(Request $request)
    {
        $date = $request->date_reserv;

        $reservations = Reservation::whereDate('date_visite', '=', $date)->get();

        if ($reservations->isEmpty()) {
            return redirect('admin/index')->with('error', 'Aucune réservation trouvée pour cette date');
        } else {
            return view('admin.index', compact('reservations'));
        }
    }

    public function reservation($id)
    {
        $reservation = Reservation::find($id);

        return view('admin/details', compact('reservation'));
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
        $reservations = Reservation::whereDate('date_visite', '<', Carbon::today()->toDateString())
            ->orderBy("heure_de_visite")->get();
        return view('admin/past', compact('reservations'));
    }
    public function deleteAll()
    {

        try {
            $reservations = Reservation::whereDate('date_visite', '<', Carbon::today()->toDateString());
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
        ) {
            Session::pull('loginId');
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


    public function add_appointment(Request $request)
    {
        if ($request->date_visite < Carbon::today()->toDateString()) {
            return redirect('/appointment')->with('error', 'la date invalide!');
        } elseif ($request->heure_de_visite < Carbon::now()->toTimeString()) {
            return redirect('/appointment')->with('error', "l'heure invalide!");

        } else {
            Reservation::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'date_visite' => $request->date_visite,
                'heure_de_visite' => $request->heure_de_visite,
            ]);

            return redirect('/appointment')->with('success', 'Réservation confirmée avec succès !');
        }
    }
    public function add_appointment_admin(Request $request)
    {
        if ($request->date_visite < Carbon::today()->toDateString()) {
            return redirect('/admin/add')->with('error', 'la date invalide!');
        } elseif ($request->heure_de_visite < Carbon::now()->toTimeString()) {
            return redirect('/admin/add')->with('error', "l'heure invalide!");

        } else {
            Reservation::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'date_visite' => $request->date_visite,
                'heure_de_visite' => $request->heure_de_visite,
            ]);

            return redirect('/admin/add')->with('success', 'Réservation confirmée avec succès !');
        }
    }

}
