<?php

declare(ticks=1);

pcntl_signal(SIGTERM, function () {
    echo "Process terminated by SIGTERM.\n";
    exit(0); // Gracefully exit on SIGTERM
});

echo "Long running process started. Waiting for termination signal.\n";

while (true) {
    echo "Worker is idle.\n";
    sleep(60); // Sleep for 60 seconds
}