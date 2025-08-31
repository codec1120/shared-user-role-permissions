<?php

namespace SharedRolePermission\Shared\Enums;

enum UserRole: string
{
    case DOCTOR = 'doctor';
    case PATIENT = 'patient';
    case STAFF = 'staff';
    case SUPER_ADMIN = "super_admin";
}
