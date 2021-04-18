<?php

namespace Enums;

class MovieType extends \SplEnum
{
    const __default = self::Regular;

    // New Price Codes should be added as Enums over any other method
    const Regular = 0;
    const NewRelease = 1;
    const Childrens = 2;
    const Scifi = 3;
    const Foreign = 4;
}