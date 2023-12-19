<?php if ($user['user_type'] === 'Dental') : ?>
    <div class="container-fluid py-2">
        <div class="card p-3 z-1 bg-primary shadow-sm">
            <div class="h1">0</div>
            <h5 class="card-title">Current Patients</h5>
            <img src="../icons/bxs-user.svg">
        </div>

        <div class="card p-3 z-1 bg-success shadow-sm">
            <div class="h1">0</div>
            <h5 class="card-title">Confirmed Patients</h5>
            <img src="../icons/bxs-user-check.svg" id="img2">
        </div>

        <div class="card p-3 z-1 bg-warning shadow-sm">
            <div class="h1">0</div>
            <h5 class="card-title">Stocks</h5>
            <img src="../icons/bxs-bar-chart-alt-2.svg">
        </div>

        <div class="card p-3 z-1 bg-danger shadow-sm">
            <div class="h1">0</div>
            <h5 class="card-title">Pending Requests</h5>
            <img src="../icons/bxs-user-plus.svg" id="img4">
        </div>
    </div>


<?php elseif ($user['user_type'] === 'Optic') : ?>
    <div class="container-fluid py-2">
        <div class="card bg-primary shadow-sm row d-flex flex-row">
            <div class="col-7 p-3">
                <div class="h1">0</div>
                <h5 class="card-title">Current Patients</h5>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="col-5 p-0" width="125" height="125" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
            </svg>
        </div>

        <div class="card bg-success shadow-sm row d-flex flex-row">
            <div class="col-7 p-3">
                <div class="h1">0</div>
                <h5 class="card-title">Confirmed Patients</h5>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="col-5 p-1" width="125" height="125" fill="currentColor" class="bi bi-person-fill-check" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4" />
            </svg>
        </div>

        <div class="card bg-danger shadow-sm row d-flex flex-row p-2">
            <div class="col-7 p-2">
                <div class="h1">0</div>
                <h5 class="card-title">Pending Requests</h5>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="col-5 mt-2 p-0 " width="100" height="100" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483m.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535m-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z" />
                <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5" />
            </svg>
        </div>
    </div>


<?php endif; ?>