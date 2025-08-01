<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Câmpul :attribute trebuie să fie acceptat.',
    'accepted_if' => 'Câmpul :attribute trebuie să fie acceptat când :other este :value.',
    'active_url' => 'Câmpul :attribute nu este un URL valid.',
    'after' => 'Câmpul :attribute trebuie să fie o dată după :date.',
    'after_or_equal' => 'Câmpul :attribute trebuie să fie o dată ulterioară sau egală cu :date.',
    'alpha' => 'Câmpul :attribute poate conține doar litere.',
    'alpha_dash' => 'Câmpul :attribute poate conține doar litere, numere și cratime.',
    'alpha_num' => 'Câmpul :attribute poate conține doar litere și numere.',
    'any_of' => 'The :attribute field is invalid.',
    'array' => 'Câmpul :attribute trebuie să fie un array.',
    'ascii' => ':Attribute trebuie să conțină doar caractere și simboluri alfanumerice pe un singur octet.',
    'before' => 'Câmpul :attribute trebuie să fie o dată înainte de :date.',
    'before_or_equal' => 'Câmpul :attribute trebuie să fie o dată înainte sau egală cu :date.',
    'between' => [
        'array' => 'Câmpul :attribute trebuie să aibă între :min și :max elemente.',
        'file' => 'Câmpul :attribute trebuie să fie între :min și :max kilobyți.',
        'numeric' => 'Câmpul :attribute trebuie să fie între :min și :max.',
        'string' => 'Câmpul :attribute trebuie să fie între :min și :max caractere.',
    ],
    'boolean' => 'Câmpul :attribute trebuie să fie adevărat sau fals.',
    'can' => 'Câmpul :attribute conține o valoare neautorizată.',
    'confirmed' => 'Confirmarea :attribute nu se potrivește.',
    'contains' => 'Câmpul :attribute lipsește o valoare obligatorie.',
    'current_password' => 'Parola e incorectă.',
    'date' => 'Câmpul :attribute nu este o dată validă.',
    'date_equals' => 'Aceasta :attribute trebuie să fie o dată egală cu :date.',
    'date_format' => 'Câmpul :attribute trebuie să fie în formatul :format.',
    'decimal' => ':Attribute trebuie să aibă :decimal de zecimale.',
    'declined' => 'Câmpul :attribute trebuie să fie declinat.',
    'declined_if' => 'Câmpul :attribute trebuie să fie declinat când :other este :value.',
    'different' => 'Câmpurile :attribute și :other trebuie să fie diferite.',
    'digits' => 'Câmpul :attribute trebuie să aibă :digits cifre.',
    'digits_between' => 'Câmpul :attribute trebuie să aibă între :min și :max cifre.',
    'dimensions' => 'Câmpul :attribute are dimensiuni de imagine nevalide.',
    'distinct' => 'Câmpul :attribute are o valoare duplicat.',
    'doesnt_end_with' => ':Attribute nu se poate termina cu una dintre următoarele valori: :values.',
    'doesnt_start_with' => ':Attribute trebuie să nu înceapă cu una dintre următoarele valori: :values.',
    'email' => 'Câmpul :attribute trebuie să fie o adresă de e-mail validă.',
    'ends_with' => 'Câmpul :attribute trebuie să se încheie cu una din următoarele valori: :values',
    'enum' => 'Câmpul :attribute selectat nu este valid.',
    'exists' => 'Câmpul :attribute selectat nu este valid.',
    'extensions' => 'Câmpul :attribute trebuie să aibă una dintre următoarele extensii: :values.',
    'file' => 'Câmpul :attribute trebuie să fie un fișier.',
    'filled' => 'Câmpul :attribute trebuie completat.',
    'gt' => [
        'array' => 'Câmpul :attribute trebuie să aibă mai multe de :value elemente.',
        'file' => 'Câmpul :attribute trebuie să fie mai mare de :value kilobyți.',
        'numeric' => 'Câmpul :attribute trebuie să fie mai mare de :value.',
        'string' => 'Câmpul :attribute trebuie să fie mai mare de :value caractere.',
    ],
    'gte' => [
        'array' => 'Câmpul :attribute trebuie să aibă :value elemente sau mai multe.',
        'file' => 'Câmpul :attribute trebuie să fie mai mare sau egal cu :value kilobyți.',
        'numeric' => 'Câmpul :attribute trebuie să fie mai mare sau egal cu :value.',
        'string' => 'Câmpul :attribute trebuie să fie mai mare sau egal cu :value caractere.',
    ],
    'hex_color' => 'Câmpul :attribute trebuie să fie o culoare hexazecimală validă.',
    'image' => 'Câmpul :attribute trebuie să fie o imagine.',
    'in' => 'Câmpul :attribute selectat nu este valid.',
    'in_array' => 'Câmpul :attribute nu există în :other.',
    'in_array_keys' => 'The :attribute field must contain at least one of the following keys: :values.',
    'integer' => 'Câmpul :attribute trebuie să fie un număr întreg.',
    'ip' => 'Câmpul :attribute trebuie să fie o adresă IP validă.',
    'ipv4' => 'Câmpul :attribute trebuie să fie o adresă IPv4 validă.',
    'ipv6' => 'Câmpul :attribute trebuie să fie o adresă IPv6 validă.',
    'json' => 'Câmpul :attribute trebuie să fie un string JSON valid.',
    'list' => 'Câmpul :attribute trebuie să fie o listă.',
    'lowercase' => ':Attribute trebuie să fie format doar din litere mici.',
    'lt' => [
        'array' => 'Câmpul :attribute trebuie să aibă mai puțin de :value elemente.',
        'file' => 'Câmpul :attribute trebuie să fie mai mic de :value kilobyți.',
        'numeric' => 'Câmpul :attribute trebuie să fie mai mic de :value.',
        'string' => 'Câmpul :attribute trebuie să fie mai mic de :value caractere.',
    ],
    'lte' => [
        'array' => 'Câmpul :attribute trebuie să aibă :value elemente sau mai puține.',
        'file' => 'Câmpul :attribute trebuie să fie mai mic sau egal cu :value kilobyți.',
        'numeric' => 'Câmpul :attribute trebuie să fie mai mic sau egal cu :value.',
        'string' => 'Câmpul :attribute trebuie să fie mai mic sau egal cu :value caractere.',
    ],
    'mac_address' => 'Câmpul :attribute trebuie să fie o adresă MAC validă.',
    'max' => [
        'array' => 'Câmpul :attribute nu poate avea mai mult de :max elemente.',
        'file' => 'Câmpul :attribute nu poate avea mai mult de :max kilobyți.',
        'numeric' => 'Câmpul :attribute nu poate fi mai mare de :max.',
        'string' => 'Câmpul :attribute nu poate avea mai mult de :max caractere.',
    ],
    'max_digits' => ':Attribute nu trebuie să conțină mai mult de :max cifre.',
    'mimes' => 'Câmpul :attribute trebuie să fie un fișier de tipul: :values.',
    'mimetypes' => 'Câmpul :attribute trebuie să fie un fișier de tipul: :values.',
    'min' => [
        'array' => 'Câmpul :attribute trebuie să aibă cel puțin :min elemente.',
        'file' => 'Câmpul :attribute trebuie să aibă cel puțin :min kilobyți.',
        'numeric' => 'Câmpul :attribute nu poate fi mai mic de :min.',
        'string' => 'Câmpul :attribute trebuie să aibă cel puțin :min caractere.',
    ],
    'min_digits' => ':Attribute trebuie să conțină cel puțin :min cifre.',
    'missing' => 'Câmpul :attribute trebuie să lipsească.',
    'missing_if' => 'Câmpul :attribute trebuie să lipsească când :other este :value.',
    'missing_unless' => 'Câmpul :attribute trebuie să lipsească, cu excepția cazului în care :other este :value.',
    'missing_with' => 'Câmpul :attribute trebuie să lipsească atunci când este prezent :values.',
    'missing_with_all' => 'Câmpul :attribute trebuie să lipsească atunci când sunt prezente :values.',
    'multiple_of' => ':Attribute trebuie să fie un multiplu de :value',
    'not_in' => 'Câmpul :attribute selectat nu este valid.',
    'not_regex' => 'Câmpul :attribute nu are un format valid.',
    'numeric' => 'Câmpul :attribute trebuie să fie un număr.',
    'password' => [
        'letters' => ':Attribute trebuie să conțină cel puțin o literă.',
        'mixed' => ':Attribute trebuie să conțină cel puțin o literă mare și o literă mică.',
        'numbers' => ':Attribute trebuie să conțină cel puțin un număr.',
        'symbols' => ':Attribute trebuie să conțină cel puțin un simbol.',
        'uncompromised' => ':Attribute dat a apărut într-o scurgere de date. Vă rugăm să alegeți un alt :attribute.',
    ],
    'present' => 'Câmpul :attribute trebuie să fie prezent.',
    'present_if' => 'Câmpul :attribute trebuie să fie prezent când :other este :value.',
    'present_unless' => 'Câmpul :attribute trebuie să fie prezent, cu excepția cazului în care :other este :value.',
    'present_with' => 'Câmpul :attribute trebuie să fie prezent atunci când este prezent :values.',
    'present_with_all' => 'Câmpul :attribute trebuie să fie prezent atunci când sunt prezenți :values.',
    'prohibited' => 'Câmpul :attribute este interzis.',
    'prohibited_if' => 'Câmpul :attribute este interzis atunci când :other este :value.',
    'prohibited_if_accepted' => 'The :attribute field is prohibited when :other is accepted.',
    'prohibited_if_declined' => 'The :attribute field is prohibited when :other is declined.',
    'prohibited_unless' => 'Câmpul :attribute este interzis, cu excepția cazului în care :other este în :values.',
    'prohibits' => 'Câmpul :attribute nu permite ca :other să fie prezent.',
    'regex' => 'Câmpul :attribute nu are un format valid.',
    'required' => 'Câmpul :attribute este obligatoriu.',
    'required_array_keys' => 'Câmpul :attribute trebuie să conțină valori pentru: :values.',
    'required_if' => 'Câmpul :attribute este necesar când :other este :value.',
    'required_if_accepted' => 'Câmpul :attribute este obligatoriu când :other este acceptat.',
    'required_if_declined' => 'The :attribute field is required when :other is declined.',
    'required_unless' => 'Câmpul :attribute este necesar, cu excepția cazului :other este in :values.',
    'required_with' => 'Câmpul :attribute este necesar când există :values.',
    'required_with_all' => 'Câmpul :attribute este necesar când există :values.',
    'required_without' => 'Câmpul :attribute este necesar când nu există :values.',
    'required_without_all' => 'Câmpul :attribute este necesar când niciuna dintre valorile :values nu există.',
    'same' => 'Câmpurile :attribute și :other trebuie să fie identice.',
    'size' => [
        'array' => 'Câmpul :attribute trebuie să aibă :size elemente.',
        'file' => 'Câmpul :attribute trebuie să aibă :size kilobyți.',
        'numeric' => 'Câmpul :attribute trebuie să fie :size.',
        'string' => 'Câmpul :attribute trebuie să aibă :size caractere.',
    ],
    'starts_with' => 'Câmpul :attribute trebuie să înceapă cu una din următoarele valori: :values',
    'string' => 'Câmpul :attribute trebuie să fie string.',
    'timezone' => 'Câmpul :attribute trebuie să fie un fus orar valid.',
    'ulid' => ':Attribute trebuie să fie un ULID valid.',
    'unique' => 'Câmpul :attribute a fost deja folosit.',
    'uploaded' => 'Câmpul :attribute nu a reușit încărcarea.',
    'uppercase' => ':Attribute trebuie să fie majuscule.',
    'url' => 'Câmpul :attribute nu este un URL valid.',
    'uuid' => 'Câmpul :attribute trebuie să fie un cod UUID valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
