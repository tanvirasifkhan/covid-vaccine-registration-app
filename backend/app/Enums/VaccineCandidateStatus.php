<?php

namespace App\Enums;

enum VaccineCandidateStatus: string
{
    public static function toArray(): array {
        return array_map(
            fn(self $enum) => $enum->value, 
            self::cases()
        );
    }
    
    case ALL = "all";
    case REGISTERED = "registered";
    case SCHEDULED = "scheduled";
    case VACCINATED = "vaccinated";
}
