<?
add_action('customize_register', function($customizer) {
	$customizer->add_section(
		'section_one', array(
			'title' => 'Основные настройки сайта',
			'description' => 'При добавлении нескольких значений в поле, пишите через запяту пример (+79288008080,+79299009090)',
			'priority' => 11,
		)
	);
  // телефон(ы)
	$customizer->add_setting('phones', 
		array('default' => '+78672501535')
	);
	$customizer->add_control('phones', array(
    'label' => 'Телефон(ы)',
    'section' => 'section_one',
    'type' => 'text',
  ));
  // Е-почта
  $customizer->add_setting('email', 
    array('default' => 'vladgazeta@rso-a.ru')
  );
  $customizer->add_control('email', array(
    'label' => 'Е-почта',
    'section' => 'section_one',
    'type' => 'text',
  ));
  // адрес
  $customizer->add_setting('address', 
		array('default' => '362025, РСО-А, г. Владикавказ, ул. Джанаева, 36, 4 этаж.')
	);
	$customizer->add_control('address', array(
    'label' => 'Адрес',
    'section' => 'section_one',
    'type' => 'text',
	));
  // копирайт сайта
  $customizer->add_setting('copyright', 
    array('default' => '© '.date('Y').' Сайт газеты "Владикавказ')
  );
  $customizer->add_control('copyright', array(
    'label' => 'Копирайт сайта (copyright ©)',
    'section' => 'section_one',
    'type' => 'text',
  ));
  $customizer->add_setting('copypast', 
    array('default' => 'Использование информации из материалов сайта возможно только с указанием источника и проставлением гиперссылки на сайт vladgazeta.online. Копирование и использование полных материалов сайта без изменений возможно лишь с разрешения редакции')
  );
  $customizer->add_control('copypast', array(
    'label' => 'Текст о незаконном капировании материалов',
    'section' => 'section_one',
    'type' => 'text',
  ));
  

  // Настройки соцсетей ==========================================================
  $customizer->add_section(
		'section_soc', array(
			'title' => 'Ссылки на соцсети',
			'description' => 'Указываем ссылки в поле',
			'priority' => 10,
		)
	);
  // Ссылки на соцсети
  $customizer->add_setting('soc_fac', 
    array('default' => 'https://www.facebook.com/gazeta_vladikavkaz/')
  );
  $customizer->add_control('soc_fac', array(
    'label' => 'Ссылка на фейсбук',
    'section' => 'section_soc',
    'type' => 'text',
  ));
  $customizer->add_setting('soc_vk', 
    array('default' => 'https://www.vk.com/gazeta_vladikavkaz/')
  );
  $customizer->add_control('soc_vk', array(
    'label' => 'Ссылка на вконтакте',
    'section' => 'section_soc',
    'type' => 'text',
  ));
  $customizer->add_setting('soc_inst', 
    array('default' => 'https://www.instagram.com/gazeta_vladikavkaz/')
  );
  $customizer->add_control('soc_inst', array(
    'label' => 'Ссылка на инстаграм',
    'section' => 'section_soc',
    'type' => 'text',
  ));
  $customizer->add_setting('soc_ok', 
    array('default' => 'https://www.ok.ru/gazeta_vladikavkaz/')
  );
  $customizer->add_control('soc_ok', array(
    'label' => 'Ссылка на одноклассники',
    'section' => 'section_soc',
    'type' => 'text',
  ));

});