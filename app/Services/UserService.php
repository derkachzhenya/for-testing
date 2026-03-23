

<?php

use App\Models\User;

$email = 'test@example.com';

// ❌ Bad: scans all rows
User::where('email', $email)->count() > 0;

// ✅ Good: stops at first match
User::where('email', $email)->exists();
