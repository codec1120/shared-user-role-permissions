<?php

namespace SharedRolePermission\Shared\Enums;

enum Permissions: string
{
    // Patient
    case VIEW_PATIENT = 'view-patient';
    case ADD_PATIENT =  'add-patient';
    case DELETE_PATIENT = 'delete-patient';
    case UPDATE_PATIENT = 'update-patient';
    case VIEW_PATIENT_MEDICAL_HISTORY = 'view-patient-medical-history';

    // Appoitnment
    case VIEW_APPOINTMENT = 'view-appointment';
    case SCHEDULE_APPOINTMENT = 'schedule-appointment';
    case UPDATE_APPOINTMENT = 'update-appointment';
    case DELETE_APPOINTMENT = 'delete-appointment';

    // Profile
    case VIEW_PROFILE = 'view-profile';
    case UPDATE_PROFILE = 'edit-profile';

    // Clinic
    case VIEW_CLINIC = 'view-clinic';
    case ADD_CLINIC = 'add-clinic';
    case ASSIGN_STAFF_TO_CLINIC = 'assign-staff';
    case DELETE_CLINIC = 'delete-clinic';
    case UPDATE_CLINIC = 'update-clinic';

    // Dashboard
    case VIEW_DASHBOARD = 'view-dashboard';

    // All Permissions
    case ALL = 'all';

    public function getValues(): array
    {
        return array_map(fn($case) => $case->value, Permissions::cases());
    }
}
