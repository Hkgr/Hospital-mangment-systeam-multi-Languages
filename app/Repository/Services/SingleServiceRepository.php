<?php


namespace App\Repository\Services;


use App\Models\Service;
use App\Models\Admin;
use App\Models\Notification;
use App\Events\SingleServiceCreated;

class SingleServiceRepository implements \App\Interfaces\Services\SingleServiceRepositoryInterface
{

    public function index()
    {
        $services = Service::all();
        return view('Dashboard.Services.Single Service.index',compact('services'));
    }

    public function store($request)
    {
        try {
            $SingleService = new Service();
            $SingleService->price = $request->price;
            $SingleService->description = $request->description;
            $SingleService->status = 1;
            $SingleService->save();

            foreach (Admin::all() as $admin) {
                Notification::create([
                    'user_id' => $admin->id,
                    'message' => 'خدمة مفردة جديدة: ' . $request->name,
                ]);
            }
            event(new SingleServiceCreated($request->name));

            // store trans
            $SingleService->name = $request->name;
            $SingleService->save();

            session()->flash('add');
            return redirect()->route('Service.index');

        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {

            $SingleService = Service::findOrFail($request->id);
            $SingleService->price = $request->price;
            $SingleService->description = $request->description;
            $SingleService->status = $request->status;
            $SingleService->save();

            // store trans
            $SingleService->name = $request->name;
            $SingleService->save();

            session()->flash('edit');
            return redirect()->route('Service.index');

        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        Service::destroy($request->id);
        session()->flash('delete');
        return redirect()->route('Service.index');
    }
}
