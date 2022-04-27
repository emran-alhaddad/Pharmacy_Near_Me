<?php

namespace App\Utils;

class RequestState
{

    public CONST REJECTED = -1;
    public CONST WAIT_ACCEPTANCE = 0;
    public CONST ACCEPTED = 1;
    public CONST WAIT_PAYMENT = 2;
    public CONST FINISHED = 3;

}
