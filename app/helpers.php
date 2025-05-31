<?php

function parseFlightTime(?string $timestamp): ?\Carbon\Carbon
{
    if (!$timestamp) return null;
    try {
        return \Carbon\Carbon::parse($timestamp); // Handles ISO 8601, including timezones!
    } catch (\Exception $e) {
        return null;
    }
}
