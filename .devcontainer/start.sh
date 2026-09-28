#!/bin/bash

cd /workspaces/projet-exam

pkill -f "artisan serve" 2>/dev/null || true

nohup php artisan serve \
    --host=0.0.0.0 \
    --port=8000 \
    > /tmp/laravel.log 2>&1 &
