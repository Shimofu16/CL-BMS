@echo off
title Running Commands
color 0A

REM Open two CMD windows
start "CMD Window 1" cmd.exe /K "php artisan serve"

@REM open http://localhost:8000
start "CMD Window 2" cmd.exe /K "start http://localhost:8000"

