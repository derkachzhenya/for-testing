<?php

// ❌ Before

isset($user['profile'])
    && isset($user['profile']['address'])
    && isset($user['profile']['address']['city']);

// ✅ After

data_get($user, 'profile.address.city');
