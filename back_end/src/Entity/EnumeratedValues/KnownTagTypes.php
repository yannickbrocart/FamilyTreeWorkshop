<?php

declare(strict_types=1);

namespace App\Entity\EnumeratedValues;

enum KnownTagTypes: string
{
    case AGNC = 'AGNC';
    case BIRT = 'BIRT';
    case CAUS = 'CAUS';
    case CHAN = 'CHAN';
    case CHAR = 'CHAR';
    case CHIL = 'CHIL';
    case COPR = 'COPR';
    case CORP = 'CORP';
    case DATA = 'DATA';
    case DATE = 'DATE';
    case DEAT = 'DEAT';
    case DEST = 'DEST';
    case FAM = 'FAM';
    case FAMC = 'FAMC';
    case FAMS = 'FAMS';
    case FILE = 'FILE';
    case FONE = 'FONE';
    case FORM = 'FORM';
    case GEDC = 'GEDC';
    case GIVN = 'GIVN';
    case HEAD = 'HEAD';
    case HUSB = 'HUSB';
    case INDI = 'INDI';
    case LANG = 'LANG';
    case LATI = 'LATI';
    case LONG = 'LONG';
    case MAP = 'MAP';
    case NAME = 'NAME';
    case NICK = 'NICK';
    case NOTE = 'NOTE';
    case NPFX = 'NPFX';
    case NSFX = 'NSFX';
    case PEDI = 'PEDI';
    case PLAC = 'PLAC';
    case RELI = 'RELI';
    case ROMN = 'ROMN';
    case SEX = 'SEX';
    case SPFX = 'SPFX';
    case SUBM = 'SUBM';
    case SOUR = 'SOUR';
    case SURN = 'SURN';
    case TIME = 'TIME';
    case TYPE = 'TYPE';
    case VERS = 'VERS';
    case WIFE = 'WIFE';
}