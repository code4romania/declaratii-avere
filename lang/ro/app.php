<?php

declare(strict_types=1);

return [

    'add_another' => 'Adaugă',

    'field' => [
        'account_institution_name' => 'Instituția care administrează și adresa acesteia',
        'account_year' => 'Deschis în anul',
        'acquisition_method' => 'Metoda de achiziție',
        'area_unit' => 'Unitate de măsură a suprafeței',
        'area' => 'Suprafață',
        'brand' => 'Marca',
        'buildings' => 'Clădiri',
        'category' => 'Categorie',
        'collectibles' => 'Obiecte de colecție',
        'contract_beneficiary' => 'Beneficiarul de contract: numele, prenumele / denumirea şi adresa',
        'contract_date' => 'Data încheierii contractului',
        'contract_duration' => 'Durata contractului',
        'contract_institution' => 'Instituția contractantă: denumirea și adresa',
        'contract_procedure' => 'Procedura prin care a fost încredințat contractul',
        'contract_type' => 'Tipul contractului',
        'contract_value' => 'Valoarea totală a contractului',
        'country' => 'Țară',
        'county' => 'Județ',
        'creditor' => 'Creditor',
        'description' => 'Descriere',
        'email' => 'Email',
        'foreign_locality' => 'Localitate',
        'income_beneficiary' => 'Cine a realizat venitul',
        'income_description' => 'Serviciul prestat/Obiectul generator de venit',
        'income_source' => 'Sursa venitului: numele, adresa',
        'income_type' => 'Tipul venitului',
        'income_value' => ' Venitul anual încasat',
        'institution_name' => 'Denumirea instituției',
        'institution' => 'Instituție',
        'locality' => 'Localitate',
        'location' => 'Adresa sau zona',
        'make_year' => 'Anul de fabricație',
        'name' => 'Nume',
        'owners' => 'Titulari',
        'ownership_percentage' => 'Procentajul de proprietate',
        'ownership_unit_measure' => 'Unitate de măsură',
        'person_name' => 'Numele complet din declarația de avere',
        'person' => 'Persoană',
        'placement_category' => 'Tip',
        'placement_name' => 'Emitent titlu/societatea în care persoana este acționar sau asociat/beneficiar de împrumut',
        'placement_share' => 'Număr de titluri/cota de participare',
        'placement_value' => 'Valoarea totală la zi',
        'plots' => 'Terenuri',
        'position_title' => 'Numele poziției',
        'position' => 'Poziție',
        'quantity' => 'Nr. de bucăți',
        'role' => 'Rol',
        'share' => 'Cotă parte',
        'shareholder_shares' => 'Nr. de părți sociale sau de acțiuni',
        'shareholder_type' => 'Calitatea deținută',
        'short_description' => 'Descriere sumară',
        'statement_date' => 'Data completării declarației',
        'transfer_category' => 'Natura bunului înstrăinat',
        'transfer_date' => 'Data înstrăinării',
        'transfer_person' => 'Persoana catre care s-a înstrăinat',
        'transfer_type' => 'Forma înstrăinării',
        'type' => 'Tip',
        'unit' => 'Unitate de măsură',
        'shareholder_unit' => 'Unitatea – denumirea și adresa',
        'value' => 'Valoare',
        'vehicles' => 'Vehicule',
        'year_due' => 'Scadent în anul',
        'year_incurred' => 'Contractat în anul',
        'year_of_acquisition' => 'Anul achiziției',
        'validated_by' => 'Validat de',
    ],

    'help_text' => [
        'person' => 'Caută persoana in baza de date. Dacă nu găsesti persoana sau nu ești sigur că este aceeași persoană in listă, apasă semnul "+" și creează o nouă persoană',
        'institution' => 'Caută instituția în baza de date. Dacă nu găsesti instituția, apasă semnul "+" și creează o nouă instituție.',
    ],

    'section' => [
        'collectibles' => 'Bunuri sub formă de metale prețioase, bijuterii, obiecte de artă și de cult, colecții de artă și numismatică, obiecte care fac parte din patrimoniul cultural național sau universal, a căror valoare însumată depășește 5.000 de euro',
        'transfers' => 'Bunuri mobile, a căror valoare depășește 3.000 de euro fiecare, și bunuri imobile înstrăinate în ultimele 12 luni',
        'financial_accounts' => 'Conturi și depozite bancare, fonduri de investiții, forme echivalente de economisire și investire, inclusiv cardurile de credit, dacă valoarea însumată a tuturor acestora depășește 5.000 de euro',
        'financial_placements' => 'Plasamente, investiții directe și împrumuturi acordate, dacă valoarea de piață însumată a tuturor acestora depășește 5.000 de euro',
        'financial_assets' => 'Alte active producătoare de venituri nete, care însumate depășesc echivalentul a 5.000 de euro pe an',
        'financial_debts' => 'Debite, ipoteci, garanții emise în beneficiul unui terț, bunuri achiziționate în sistem leasing și alte asemenea bunuri, dacă valoarea însumată a tuturor acestora depășește 5.000 de euro',
    ],

    'assets' => [
        'label' => [
            'singular' => 'Declarație de avere',
            'plural' => 'Declarații de avere',
        ],
    ],

    'interests' => [
        'label' => [
            'singular' => 'Declarație de interese',
            'plural' => 'Declarații de interese',
        ],
    ],

    'user' => [
        'label' => [
            'singular' => 'Utilizator',
            'plural' => 'Utilizatori',
        ],

        'role' => [
            'admin' => 'Administrator',
            'validator' => 'Validator',
            'contributor' => 'Contribuitor',
            'viewer' => 'Vizualizator',
        ],
    ],

    'actions' => [
        'validate' => [
            'button' => 'Validează',
            'confirm' => [
                'title' => 'Confirmă validarea',
                'description' => 'Ești sigur că vrei să validezi această declarație?',
                'success' => 'Declarația a fost validată cu succes.',
            ],
        ],
    ],
];
