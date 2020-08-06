<?php

class Tanggal
{
    public function tgl_ind($date)
    {
        $d = substr($date, 8, 2);
        $m = substr($date, 5, 2);
        $y = substr($date, 0, 4);
        return $d . '/' . $m . '/' . $y;
    }
}
