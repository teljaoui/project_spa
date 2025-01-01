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
    
        // Vérifie si la date est dans le passé
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
    
    public function backtime(){
        if(Session::has('date')){
            Session::pull('date');
        }
        return redirect('/admin/add');
    }

    public function addtime(){

    }

}
