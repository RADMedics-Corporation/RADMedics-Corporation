<?php

namespace App\Enums;

enum Role: string
{
    case SuperAdmin = 'super_admin';
    case Admin = 'admin';
    case Instructor = 'instructor';
    case Student = 'student';
    case Temporary = 'temporary';

    public function label(): string
    {
        return match($this) {
		self::SuperAdmin => 'super_admin',
		self::Admin => 'admin',
		self::Instructor => 'instructor',
		self::Student => 'student',
		self::Temporary => 'temporary',
        };
    }
}
