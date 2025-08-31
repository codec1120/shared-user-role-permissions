<?php

namespace SharedRolePermission\Shared\Traits;

use Illuminate\Database\Eloquent\Builder;
use App\Enums\{UserRole, Permissions};

trait HasRoleAndPermissions
{
    // Check if user has a specific role
    public function hasRole(UserRole|string $role): bool
    {
        $roleValue = $role instanceof UserRole ? $role->value : $role;
        
        return $this->role === $roleValue;
    }

    public function hasAnyRole(array $roles): bool
    {
        return in_array($this->role, $roles);
    }

    // Action base permission verifier
    public function can(string $permission): bool
    {
        $userRolePermissions = $this->getUserRolePermissions();

        return in_array($permission, $userRolePermissions[$this->role] ?? []);
    }

    // Combined user-role permissions
    protected function getUserRolePermissions(): array
    {
        return [
            UserRole::DOCTOR->value => [
                Permissions::ALL->value
            ],
            UserRole::SUPER_ADMIN->value => [
                Permissions::ALL->value
            ],
            UserRole::PATIENT->value => [
                Permissions::VIEW_PATIENT->value,
                Permissions::UPDATE_PATIENT->value,
                Permissions::VIEW_PATIENT_MEDICAL_HISTORY->value,
                Permissions::VIEW_APPOINTMENT->value,
                Permissions::SCHEDULE_APPOINTMENT->value,
                Permissions::UPDATE_APPOINTMENT->value,
                Permissions::DELETE_APPOINTMENT->value,
                Permissions::VIEW_PROFILE->value,
                Permissions::UPDATE_PROFILE->value,
            ],
            UserRole::STAFF->value => [
                Permissions::VIEW_PATIENT->value,
                Permissions::UPDATE_PATIENT->value,
                Permissions::VIEW_PATIENT_MEDICAL_HISTORY->value,
                Permissions::VIEW_APPOINTMENT->value,
                Permissions::SCHEDULE_APPOINTMENT->value,
                Permissions::UPDATE_APPOINTMENT->value,
                Permissions::DELETE_APPOINTMENT->value,
                Permissions::VIEW_PROFILE->value,
                Permissions::UPDATE_PROFILE->value,
                Permissions::VIEW_DASHBOARD->value,
            ],
        ];
    }
}
