<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Horaire;
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
        $times = Horaire::all();
        $clients = Client::all();
        $reservations = Reservation::with(['horaire', 'client'])
            ->whereDate('reservation', '=', Carbon::today()->toDateString())
            ->orderBy("time_id")->get();
        return view('admin/index', compact('clients', 'times', 'reservations'));
    }
    public function searchid(Request $request)
    {
        $id = $request->input('id');
        $times = Horaire::all();
        $clients = Client::all();

        $reservation = Reservation::with(['horaire', 'client'])->find($id);

        if ($reservation) {
            return view('admin.index', compact('clients', 'times', 'reservation'));
        } else {
            return redirect()->back()->with('error', 'Reservation not found');
        }
    }
    public function searchdate(Request $request)
    {
        $date = $request->date_reserv;
        $times = Horaire::all();
        $clients = Client::all();
        $reservation_date = Reservation::with(['horaire', 'client'])->where("reservation", "=", $date)->get();
        if ($reservation_date) {
            return view('admin.index', compact('clients', 'times', 'reservation_date'));
        } else {
            return redirect()->back()->with('error', 'Reservations not found');
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
                session()->flash('success', 'reservation Delete success.');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Error delete reservation: ' . $e->getMessage());
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
                session()->flash('success', 'reservation Delete success.');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Error delete reservation: ' . $e->getMessage());
        }
        return redirect('admin/index');
    }
    function loginPost(Request $request)
    {
        $user = User::where('email', '=', 'admin')->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('/admin/index')->with("success", "Welcome Back Admin , login has success");
            } else {
                return back()->withErrors(
                    [
                        'email' => "Email ou mot de passe incorrect."
                    ]
                )->onlyInput('email');
            }
        } else {
            return back()->withErrors([
                'email' => "Email Not found"
            ])->withInput();
        }
    }
    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('/admin/login')->with('success', 'You have been logged out successfully.');
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
            session()->flash('success', 'Password Modifié avec succès.');
        } else {
            session()->flash('error', 'Passwords do not match');
        }
        return redirect('/admin/updatepassword');
    }
    public function management()
    {
        $times = Horaire::orderBy('time', 'asc')->get();
        return view('admin/management', compact('times'));
    }
    public function timePost(Request $request)
    {
        try {
            $request->validate([
                'time' => 'required|date_format:H:i'
            ]);

            Horaire::create([
                'time' => $request->time
            ]);
            session()->flash('success', 'Time Add success.');
        } catch (\Exception $e) {
            session()->flash('error', 'Error adding time: ' . $e->getMessage());
        }
        return redirect('/admin/management');
    }
    public function timdelete(Request $request)
    {
        try {
            $tim = Horaire::find($request->id);
            if ($tim) {
                $tim->delete();
                session()->flash('success', 'Time Delete success.');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Error adding time: ' . $e->getMessage());
        }
        return redirect('admin/management');
    }
    public function addPost(Request $request)
    {
        $date_reserve = $request->date_reserve;

        if ($date_reserve < Carbon::today()->toDateString()) {
            return redirect('/admin/add')->with('error', 'Date entered is in the past. Please select a valid date.');
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

        return redirect('/admin/add')->with('success', 'Time selected successfully!');
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
            return redirect('/admin/add')->with('error', 'Missing session data. Please try again.');
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

        return redirect('/admin/add')->with('success', 'Reservation confirmed successfully!');
    }

}
