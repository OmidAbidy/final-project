<?php
use Illuminate\Support\Facades\Broadcast;


Broadcast::channel('ClientJob.{jobId}', function ($user, $jobId) {
    return true; // or add auth logic
});
