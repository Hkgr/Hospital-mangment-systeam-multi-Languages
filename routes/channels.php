<?php

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Broadcast;


Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int)$user->id === (int)$id;
});

Broadcast::channel('create-invoice.admin', fn($user) => auth('admin')->check(), ['guards' => ['admin']]);

Broadcast::channel('create-receipt.admin', fn($user) => auth('admin')->check(), ['guards' => ['admin']]);
Broadcast::channel('create-section.admin', fn($user) => auth('admin')->check(), ['guards' => ['admin']]);
Broadcast::channel('create-ambulance-call.admin', fn($user) => auth('admin')->check(), ['guards' => ['admin']]);
Broadcast::channel('create-doctor.admin', fn($user) => auth('admin')->check(), ['guards' => ['admin']]);
Broadcast::channel('create-insurance.admin', fn($user) => auth('admin')->check(), ['guards' => ['admin']]);
Broadcast::channel('create-ambulance.admin', fn($user) => auth('admin')->check(), ['guards' => ['admin']]);
Broadcast::channel('create-single-service.admin', fn($user) => auth('admin')->check(), ['guards' => ['admin']]);
Broadcast::channel('create-group-service.admin', fn($user) => auth('admin')->check(), ['guards' => ['admin']]);
Broadcast::channel('create-patient.admin', fn($user) => auth('admin')->check(), ['guards' => ['admin']]);
Broadcast::channel('create-payment.admin', fn($user) => auth('admin')->check(), ['guards' => ['admin']]);
Broadcast::channel('create-appointment.admin', fn($user) => auth('admin')->check(), ['guards' => ['admin']]);
Broadcast::channel('create-ray.ray_employee', fn($user) => auth('ray_employee')->check(), ['guards' => ['ray_employee']]);
Broadcast::channel('create-laboratorie.laboratorie_employee', fn($user) => auth('laboratorie_employee')->check(), ['guards' => ['laboratorie_employee']]);
Broadcast::channel(
    'create-invoice.{doctor_id}',
    function ($user, $doctor_id) {
        return $user->id == $doctor_id;
    },
    ['guards' => ['web', 'admin', 'patient', 'doctor', 'ray_employee', 'laboratorie_employee', 'api']]
);


Broadcast::channel(
    'create-receipt.doctor.{doctor_id}',
    function ($user, $doctor_id) {
        return $user->id == $doctor_id;
    },
    ['guards' => ['web', 'admin', 'patient', 'doctor', 'ray_employee', 'laboratorie_employee', 'api']]
);

Broadcast::channel(
    'create-receipt.patient.{patient_id}',
    function ($user, $patient_id) {
        return $user->id == $patient_id;
    },
    ['guards' => ['web', 'admin', 'patient', 'doctor', 'ray_employee', 'laboratorie_employee', 'api']]
);

Broadcast::channel(
    'create-payment.patient.{patient_id}',
    function ($user, $patient_id) {
        return $user->id == $patient_id;
    },
    ['guards' => ['web', 'admin', 'patient', 'doctor', 'ray_employee', 'laboratorie_employee', 'api']]
);

Broadcast::channel(
    'confirm-appointment.patient.{patient_id}',
    function ($user, $patient_id) {
        return $user->id == $patient_id;
    },
    ['guards' => ['web', 'admin', 'patient', 'doctor', 'ray_employee', 'laboratorie_employee', 'api']]
);

Broadcast::channel(
    'confirm-appointment.doctor.{doctor_id}',
    function ($user, $doctor_id) {
        return $user->id == $doctor_id;
    },
    ['guards' => ['web', 'admin', 'patient', 'doctor', 'ray_employee', 'laboratorie_employee', 'api']]
);

Broadcast::channel(
    'create-diagnosis.patient.{patient_id}',
    function ($user, $patient_id) {
        return $user->id == $patient_id;
    },
    ['guards' => ['web', 'admin', 'patient', 'doctor', 'ray_employee', 'laboratorie_employee', 'api']]
);

Broadcast::channel(
    'create-diagnosis.doctor.{doctor_id}',
    function ($user, $doctor_id) {
        return $user->id == $doctor_id;
    },
    ['guards' => ['web', 'admin', 'patient', 'doctor', 'ray_employee', 'laboratorie_employee', 'api']]
);

Broadcast::channel(
    'create-ray.patient.{patient_id}',
    function ($user, $patient_id) {
        return $user->id == $patient_id;
    },
    ['guards' => ['web', 'admin', 'patient', 'doctor', 'ray_employee', 'laboratorie_employee', 'api']]
);

Broadcast::channel(
    'create-ray.doctor.{doctor_id}',
    function ($user, $doctor_id) {
        return $user->id == $doctor_id;
    },
    ['guards' => ['web', 'admin', 'patient', 'doctor', 'ray_employee', 'laboratorie_employee', 'api']]
);

Broadcast::channel(
    'create-laboratorie.patient.{patient_id}',
    function ($user, $patient_id) {
        return $user->id == $patient_id;
    },
    ['guards' => ['web', 'admin', 'patient', 'doctor', 'ray_employee', 'laboratorie_employee', 'api']]
);

Broadcast::channel(
    'create-laboratorie.doctor.{doctor_id}',
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
