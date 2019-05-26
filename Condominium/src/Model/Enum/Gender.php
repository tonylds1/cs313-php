<?php
namespace cs313\Condominium\Model\Enum;

class Gender extends \SplEnum {
    const __default = self::Male;

    const Male = 1;
    const Female = 2;
}
