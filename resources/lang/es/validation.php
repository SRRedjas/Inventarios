<?php

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

    'accepted' => 'El campo :attribute  debe ser aceptado.',
    'accepted_if' => 'El campo :attribute debe ser aceptado cuando :other es :value.',
    'active_url' => 'El campo :attribute debe ser una URL valida.',
    'after' => 'El campo :attribute debe ser una fecha posterior a :date.',
    'after_or_equal' => 'El campo :attribute debe ser una fecha posterior o igual a :date.',
    'alpha' => 'El campo :attribute debe contener solo palabras.',
    'alpha_dash' => 'El campo :attribute debe contener unicamente letras,numeros , y guiones.',
    'alpha_num' => 'El campo :attribute solo debe contener letras y numeros.',
    'any_of' => 'El campo :attribute es invalido.',
    'array' => 'El campo :attribute debe ser una lista.',
    'ascii' => 'El campo :attribute must only contain single-byte alphanumeric characters and symbols.',
    'before' => 'El campo :attribute debe ser uina fecha antes de :date.',
    'before_or_equal' => 'El campo :attribute debe ser una fecha igual o anterior a :date.',
    'between' => [
        'array' => 'El campo :attribute debe tener entre :min y :max items.',
        'file' => 'El campo :attribute debe pesar entre :min y :max kilobytes.',
        'numeric' => 'El campo :attribute debe ser un valor entre :min y :max.',
        'string' => 'El campo :attribute debe tener entre :min y :max cáracteres.',
    ],
    'boolean' => 'El campo :attribute debe ser verdadero o falso.',
    'can' => 'El campo :attribute contiene un valor no autorizado.',
    'confirmed' => 'El campo :attribute confirmación no coincide.',
    'contains' => 'El campo :attribute no tiene un valor requerido.',
    'current_password' => 'La contraseña es incorrecta.',
    'date' => 'El campo :attribute debe ser una fecha valida.',
    'date_equals' => 'El campo :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El campo :attribute debe tener el formato: :format.',
    'decimal' => 'El campo :attribute debe tener :decimal valores decimales.',
    'declined' => 'El campo :attribute debe ser rechazado.',
    'declined_if' => 'El campo :attribute debe ser rechazado cuando :other es :value.',
    'different' => 'El campo :attribute y :other debe ser diferente.',
    'digits' => 'El campo :attribute debe tener :digits digitos.',
    'digits_between' => 'El campo :attribute debe tener entre :min and :max digitos.',
    'dimensions' => 'El campo :attribute no tiene las dimensiones correctas.',
    'distinct' => 'El campo :attribute tiene un valor duplicado.',
    'doesnt_contain' => 'El campo :attribute no debe contener ninguno de los siguientes valores: :values.',
    'doesnt_end_with' => 'El campo :attribute no debe finalizar con ninguno de los siguientes valores: :values.',
    'doesnt_start_with' => 'El campo :attribute no debe iniciar con ninguno de los siguientes valores: :values.',
    'email' => 'El campo :attribute debe ser una direccion de correo adecuada.',
    'encoding' => 'El campo :attribute debe estar codificado en :encoding.',
    'ends_with' => 'El campo :attribute debe terminar con uno de los siguientes valores: :values.',
    'enum' => 'El :attribute seleccionado es invalido.',
    'exists' => 'El  :attribute  seleccionado es invalido.',
    'extensions' => 'El campo :attribute debe tener una de las siguientes extensoines: :values.',
    'file' => 'El campo :attribute debe ser un archivo.',
    'filled' => 'El campo :attribute debe tener un valor.',
    'gt' => [
        'array' => 'El campo :attribute debe tener mas de :value items.',
        'file' => 'El campo :attribute debe ser mayor que :value kilobytes.',
        'numeric' => 'El campo :attribute ser mayor que :value.',
        'string' => 'El campo :attribute debe ser mayor que :value caracteres.',
    ],
    'gte' => [
        'array' => 'El campo :attribute debe tener :value o mas items.',
        'file' => 'El campo :attribute debe ser mayor o igual que :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser mayor o igual que :value.',
        'string' => 'El campo :attribute debe tener :value  o mas caracteres.',
    ],
    'hex_color' => 'El campo :attribute debe ser un color hexadecimal.',
    'image' => 'El campo :attribute debe ser una imagen.',
    'in' => 'El :attribute seleccionado es invalido.',
    'in_array' => 'El campo :attribute debe estar en :other.',
    'in_array_keys' => 'El campo :attribute debe contener uno de los siguientes valores: :values.',
    'integer' => 'El campo :attribute debe ser un entero.',
    'ip' => 'El campo :attribute debe ser una direccion IP valida.',
    'ipv4' => 'El campo :attribute debe ser una direccion IPv4 valida.',
    'ipv6' => 'El campo :attribute debe ser una direccion IPv6 valida.',
    'json' => 'El campo :attribute debe ser una cadena JSON valida.',
    'list' => 'El campo :attribute debe ser una lista.',
    'lowercase' => 'El campo :attribute debe estar en minusculas.',
    'lt' => [
        'array' => 'El campo :attribute debe tener menos de :value items.',
        'file' => 'El campo :attribute debe tener menos de :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser menor que :value.',
        'string' => 'El campo :attribute debe tener menos de :value caracteres.',
    ],
    'lte' => [
        'array' => 'El campo :attribute no debe tener mas de :value items.',
        'file' => 'El campo :attribute debe tener igual o menos  :value kilobytes.',
        'numeric' => 'El campo :attribute debe tener ser menor o igual que :value.',
        'string' => 'El campo :attribute debe tener :value o menos caracteres.',
    ],
    'mac_address' => 'El campo :attribute debe ser una direccion MAC valida.',
    'max' => [
        'array' => 'El campo :attribute must not have more than :max items.',
        'file' => 'El campo :attribute must not be greater than :max kilobytes.',
        'numeric' => 'El campo :attribute must not be greater than :max.',
        'string' => 'El campo :attribute must not be greater than :max characters.',
    ],
    'max_digits' => 'El campo :attribute must not have more than :max digits.',
    'mimes' => 'El campo :attribute debe ser a file of type: :values.',
    'mimetypes' => 'El campo :attribute debe ser a file of type: :values.',
    'min' => [
        'array' => 'El campo :attribute debe tener al menos :min items.',
        'file' => 'El campo :attribute debe tener al menos :min kilobytes.',
        'numeric' => 'El campo :attribute debe tener al menos :min.',
        'string' => 'El campo :attribute debe tener al menos :min characters.',
    ],
    'min_digits' => 'El campo :attribute must have at least :min digits.',
    'missing' => 'El campo :attribute debe ser missing.',
    'missing_if' => 'El campo :attribute debe ser missing when :other is :value.',
    'missing_unless' => 'El campo :attribute debe ser missing unless :other is :value.',
    'missing_with' => 'El campo :attribute debe ser missing when :values is present.',
    'missing_with_all' => 'El campo :attribute debe ser missing when :values are present.',
    'multiple_of' => 'El campo :attribute debe ser a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'El campo :attribute format is invalid.',
    'numeric' => 'El campo :attribute debe ser a number.',
    'password' => [
        'letters' => 'El campo :attribute must contain at least one letter.',
        'mixed' => 'El campo :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'El campo :attribute must contain at least one number.',
        'symbols' => 'El campo :attribute must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'El campo :attribute debe ser present.',
    'present_if' => 'El campo :attribute debe ser present when :other is :value.',
    'present_unless' => 'El campo :attribute debe ser present unless :other is :value.',
    'present_with' => 'El campo :attribute debe ser present when :values is present.',
    'present_with_all' => 'El campo :attribute debe ser present when :values are present.',
    'prohibited' => 'El campo :attribute is prohibited.',
    'prohibited_if' => 'El campo :attribute is prohibited when :other is :value.',
    'prohibited_if_accepted' => 'El campo :attribute is prohibited when :other is accepted.',
    'prohibited_if_declined' => 'El campo :attribute is prohibited when :other is declined.',
    'prohibited_unless' => 'El campo :attribute is prohibited unless :other is in :values.',
    'prohibits' => 'El campo :attribute prohibits :other from being present.',
    'regex' => 'El formato del campo :attribute  es invalido.',
    'required' => 'El campo :attribute es obligatorio.',
    'required_array_keys' => 'El campo :attribute must contain entries for: :values.',
    'required_if' => 'El campo :attribute is required when :other is :value.',
    'required_if_accepted' => 'El campo :attribute is required when :other is accepted.',
    'required_if_declined' => 'El campo :attribute is required when :other is declined.',
    'required_unless' => 'El campo :attribute is required unless :other is in :values.',
    'required_with' => 'El campo :attribute is required when :values is present.',
    'required_with_all' => 'El campo :attribute is required when :values are present.',
    'required_without' => 'El campo :attribute is required when :values is not present.',
    'required_without_all' => 'El campo :attribute is required when none of :values are present.',
    'same' => 'El campo :attribute must match :other.',
    'size' => [
        'array' => 'El campo :attribute must contain :size items.',
        'file' => 'El campo :attribute debe ser :size kilobytes.',
        'numeric' => 'El campo :attribute debe ser :size.',
        'string' => 'El campo :attribute debe ser :size characters.',
    ],
    'starts_with' => 'El campo :attribute must start with one of the following: :values.',
    'string' => 'El campo :attribute debe ser a string.',
    'timezone' => 'El campo :attribute debe ser a valid timezone.',
    'unique' => 'El :attribute ya esta en uso.',
    'uploaded' => 'El :attribute fallo en subirse.',
    'uppercase' => 'El campo :attribute debe ser mayusculas.',
    'url' => 'El campo :attribute debe ser a valid URL.',
    'ulid' => 'El campo :attribute debe ser a valid ULID.',
    'uuid' => 'El campo :attribute debe ser a valid UUID.',

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
