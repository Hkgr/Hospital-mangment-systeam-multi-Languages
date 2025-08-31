<?php

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Broadcast;


Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int)$user->id === (int)$id;
});

Broadcast::channel('create-invoice.admin', fn($user) => auth('admin')->check(), ['guards' => ['admin']]);


Broadcast::channel('create-section.admin', fn($user) => auth('admin')->check(), ['guards' => ['admin']]);
Broadcast::channel('create-ambulance-call.admin', fn($user) => auth('admin')->check(), ['guards' => ['admin']]);
Broadcast::channel('create-doctor.admin', fn($user) => auth('admin')->check(), ['guards' => ['admin']]);
Broadcast::channel('create-insurance.admin', fn($user) => auth('admin')->check(), ['guards' => ['admin']]);
Broadcast::channel('create-ambulance.admin', fn($user) => auth('admin')->check(), ['guards' => ['admin']]);
Broadcast::channel('create-single-service.admin', fn($user) => auth('admin')->check(), ['guards' => ['admin']]);
Broadcast::channel('create-group-service.admin', fn($user) => auth('admin')->check(), ['guards' => ['admin']]);
Broadcast::channel(
    'create-invoice.{doctor_id}',
    function ($user, $doctor_id) {
        return $user->id == $doctor_id;
    },
    ['guards' => ['web', 'admin', 'patient', 'doctor', 'ray_employee', 'laboratorie_employee', 'api']]
);

Broadcast::channel(
    'chat.{receiver_id}',
    function (Doctor $user, $receiver_id) {
        return $user->id == $receiver_id;
    },
    ['guards' => ['web', 'admin', 'patient', 'doctor', 'ray_employee', 'laboratorie_employee', 'api']]
);

Broadcast::channel(
    'chat2.{receiver_id}',
    function (Patient $user, $receiver_id) {
        return $user->id == $receiver_id;
    },
    ['guards' => ['web', 'admin', 'patient', 'doctor', 'ray_employee', 'laboratorie_employee', 'api']]
);
