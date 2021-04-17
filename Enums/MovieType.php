<?php

namespace Enums;

class MovieType extends \SplEnum
{
    const __default = self::Regular;

    const Regular = 0;
    const NewRelease = 1;
    const Childrens = 2;
}