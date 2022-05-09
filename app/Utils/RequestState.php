<?php

namespace App\Utils;

class RequestState
{

    public CONST REJECTED = -1;
    public CONST WAIT_ACCEPTANCE = 0;
    public CONST ACCEPTED = 1;
    public CONST WAIT_DELIVERY = 2;
    public CONST FINISHED = 3;
    public CONST NOT_COMPLETED = 4;

}
