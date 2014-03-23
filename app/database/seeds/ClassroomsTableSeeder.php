<?php

class ClassroomsTableSeeder extends Seeder {

	public function run()
	{
		DB::disableQueryLog();
		
		$classrooms = array(
			array(
				'name' => 'Construction Drawings and Detailing',
				'description' => ''
			),
			array(
				'name' => 'Fundamentals of Design I',
				'description' => ''
			),
			array(
				'name' => 'Fundamentals of Design II',
				'description' => ''
			),
			array(
				'name' => 'History of the Built Environment/Discussion',
				'description' => ''
			),
			array(
				'name' => 'Analysis of the Built Environment',
				'description' => ''
			),
			array(
				'name' => 'Graphic Software for Architects, Constructors, Designers, and Planners I',
				'description' => ''
			),
			array(
				'name' => 'Computer Applications in Architecture I',
				'description' => ''
			),
			array(
				'name' => 'Clinical Internship',
				'description' => ''
			),
			array(
				'name' => 'Study Abroad in Design:',
				'description' => ''
			),
			array(
				'name' => 'Elements of Architectural Expression: Colors & Materials',
				'description' => ''
			),
			array(
				'name' => 'Entertainment and Fine Arts Law',
				'description' => ''
			),
			array(
				'name' => 'Entertainment and Fine Arts Law II',
				'description' => ''
			),
			array(
				'name' => 'Presentation Graphics',
				'description' => ''
			),
			array(
				'name' => 'Animation Graphics',
				'description' => ''
			),
			array(
				'name' => 'Independent Study',
				'description' => ''
			),
			array(
				'name' => 'Special Topics in Design',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Architecture',
				'description' => ''
			),
			array(
				'name' => 'Fundamentals of Architecture I',
				'description' => ''
			),
			array(
				'name' => 'Fundamentals of Architecture II',
				'description' => ''
			),
			array(
				'name' => 'Design With Climate',
				'description' => ''
			),
			array(
				'name' => 'Architectural Design I',
				'description' => ''
			),
			array(
				'name' => 'Architectural Design II',
				'description' => ''
			),
			array(
				'name' => 'Developing Sustainable Design',
				'description' => ''
			),
			array(
				'name' => 'Professional Practice and Society',
				'description' => ''
			),
			array(
				'name' => 'Multidiscipline Theory and Analysis in Architecture',
				'description' => ''
			),
			array(
				'name' => 'Visionary and Utopian Architecture: Plato to Bladerunner',
				'description' => ''
			),
			array(
				'name' => 'Architecture and the New Urbanism',
				'description' => ''
			),
			array(
				'name' => 'The Enlightenment to Midth Century: Architectural History and Theory',
				'description' => ''
			),
			array(
				'name' => 'TwentiethCentury Architectural History and Theory',
				'description' => ''
			),
			array(
				'name' => 'Architecture in Las Americas',
				'description' => ''
			),
			array(
				'name' => 'History of Renaissance and Baroque Architecture',
				'description' => ''
			),
			array(
				'name' => 'Design and Development',
				'description' => ''
			),
			array(
				'name' => 'Issues in Contemporary Urbanism',
				'description' => ''
			),
			array(
				'name' => 'Construction Documents and Specifications',
				'description' => ''
			),
			array(
				'name' => 'Architectural Design III',
				'description' => ''
			),
			array(
				'name' => 'Architecture, Place and Identity',
				'description' => ''
			),
			array(
				'name' => 'Architectural Design IV',
				'description' => ''
			),
			array(
				'name' => 'NonWestern Settlements',
				'description' => ''
			),
			array(
				'name' => 'Professional Practice',
				'description' => ''
			),
			array(
				'name' => 'Special Topics in Architectural Design',
				'description' => ''
			),
			array(
				'name' => 'Special Topics in Architectural History and Theory',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Interior Design',
				'description' => ''
			),
			array(
				'name' => 'Design Communication',
				'description' => ''
			),
			array(
				'name' => 'Interior Construction and Detailing',
				'description' => ''
			),
			array(
				'name' => 'Interior Textiles',
				'description' => ''
			),
			array(
				'name' => 'Fundamentals of Interior Design I',
				'description' => ''
			),
			array(
				'name' => 'Fundamentals of Interior Design II',
				'description' => ''
			),
			array(
				'name' => 'Interior Construction Documents and Specifications',
				'description' => ''
			),
			array(
				'name' => 'Interior Architectural Systems',
				'description' => ''
			),
			array(
				'name' => 'History of Architectural Interiors I',
				'description' => ''
			),
			array(
				'name' => 'History of Architectural Interiors II',
				'description' => ''
			),
			array(
				'name' => 'Interior Design I',
				'description' => ''
			),
			array(
				'name' => 'Interior Design II',
				'description' => ''
			),
			array(
				'name' => 'Designed Environment and Human Behavior',
				'description' => ''
			),
			array(
				'name' => 'Facilities Planning & Design',
				'description' => ''
			),
			array(
				'name' => 'Design and Development',
				'description' => ''
			),
			array(
				'name' => 'Exhibition Design',
				'description' => ''
			),
			array(
				'name' => 'Interior Design III',
				'description' => ''
			),
			array(
				'name' => 'Interior Design IV',
				'description' => ''
			),
			array(
				'name' => 'Furniture Design',
				'description' => ''
			),
			array(
				'name' => 'Professional Practice',
				'description' => ''
			),
			array(
				'name' => 'Independent Study',
				'description' => ''
			),
			array(
				'name' => 'Special Topics in Interior Design',
				'description' => ''
			),
			array(
				'name' => 'Design With Nature',
				'description' => ''
			),
			array(
				'name' => 'Design Communication',
				'description' => ''
			),
			array(
				'name' => 'Design with Climate',
				'description' => ''
			),
			array(
				'name' => 'History of Landscape Architecture II',
				'description' => ''
			),
			array(
				'name' => 'Land Use Management',
				'description' => ''
			),
			array(
				'name' => 'Land Use Planning and Controls',
				'description' => ''
			),
			array(
				'name' => 'Campus Planning and Design',
				'description' => ''
			),
			array(
				'name' => 'GIS Planning Methods',
				'description' => ''
			),
			array(
				'name' => 'History and Theory of Golf Course Development',
				'description' => ''
			),
			array(
				'name' => 'Golf Course Design',
				'description' => ''
			),
			array(
				'name' => 'Landscape Architecture Design Vll',
				'description' => ''
			),
			array(
				'name' => 'Landscape Architecture Design VIII',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Urban Planning',
				'description' => ''
			),
			array(
				'name' => 'History of Cities I',
				'description' => ''
			),
			array(
				'name' => 'History of Cities II',
				'description' => ''
			),
			array(
				'name' => 'Site Planning and Environmental Analysis',
				'description' => ''
			),
			array(
				'name' => 'Site Planning and Design I',
				'description' => ''
			),
			array(
				'name' => 'Urban Form and Design',
				'description' => ''
			),
			array(
				'name' => 'Urban Planning and Design II',
				'description' => ''
			),
			array(
				'name' => 'Regional Planning Issues',
				'description' => ''
			),
			array(
				'name' => 'Urban Planning and Design III',
				'description' => ''
			),
			array(
				'name' => 'Statistical and Policy Planning',
				'description' => ''
			),
			array(
				'name' => 'Urban Planning and Design IV',
				'description' => ''
			),
			array(
				'name' => 'Special Topics in Urban Planning and Design',
				'description' => ''
			),
			array(
				'name' => 'AfroAmerican Survey I',
				'description' => ''
			),
			array(
				'name' => 'AfroAmerican Survey II',
				'description' => ''
			),
			array(
				'name' => 'AfroAmerican Music and Culture',
				'description' => ''
			),
			array(
				'name' => 'AfroAmerican Masculinity',
				'description' => ''
			),
			array(
				'name' => 'Survey of AfricanAmerican Dance',
				'description' => ''
			),
			array(
				'name' => 'African American Psychology',
				'description' => ''
			),
			array(
				'name' => 'Contemporary Black Filmmakers',
				'description' => ''
			),
			array(
				'name' => 'AASAfroAmerican Heroes in Film',
				'description' => ''
			),
			array(
				'name' => 'AfroAmericans in Film',
				'description' => ''
			),
			array(
				'name' => 'Film, Race, and Ethnicity',
				'description' => ''
			),
			array(
				'name' => 'Introduction to AfricanAmerican Literature',
				'description' => ''
			),
			array(
				'name' => 'Slave Narratives, Literature, and Imagery',
				'description' => ''
			),
			array(
				'name' => 'Ideologies of Intolerance',
				'description' => ''
			),
			array(
				'name' => 'From Civil Rights to Black Power and Beyond',
				'description' => ''
			),
			array(
				'name' => 'Selected Topics in AfroAmerican Film',
				'description' => ''
			),
			array(
				'name' => 'Africa in World Politics',
				'description' => ''
			),
			array(
				'name' => 'The Politics of SubSaharan Africa',
				'description' => ''
			),
			array(
				'name' => 'AfroAmerican Spirituality',
				'description' => ''
			),
			array(
				'name' => 'AfroAmerican Gender',
				'description' => ''
			),
			array(
				'name' => 'AfroAmerican Social History',
				'description' => ''
			),
			array(
				'name' => 'Contemporary Issues in AfroAmerican Studies',
				'description' => ''
			),
			array(
				'name' => 'Constructions of Racial Ambiguity',
				'description' => ''
			),
			array(
				'name' => 'Malcolm X',
				'description' => ''
			),
			array(
				'name' => 'Politics of Racial Ambiguity',
				'description' => ''
			),
			array(
				'name' => 'Selected Topics in AfroAmerican Studies',
				'description' => ''
			),
			array(
				'name' => 'Early AfricanAmerican Literature',
				'description' => ''
			),
			array(
				'name' => 'Modern AfricanAmerican Literature',
				'description' => ''
			),
			array(
				'name' => 'Independent Research in AfroAmerican Studies',
				'description' => ''
			),
			array(
				'name' => 'Construction Technologies I',
				'description' => ''
			),
			array(
				'name' => 'Construction Technologies II',
				'description' => ''
			),
			array(
				'name' => 'Environmental Control Systems I',
				'description' => ''
			),
			array(
				'name' => 'Environmental Control Systems II',
				'description' => ''
			),
			array(
				'name' => 'Structures for Architects I',
				'description' => ''
			),
			array(
				'name' => 'Structures for Architects II',
				'description' => ''
			),
			array(
				'name' => 'Advanced Topics and Experimentation in Structures',
				'description' => ''
			),
			array(
				'name' => 'Interior Lighting Design',
				'description' => ''
			),
			array(
				'name' => 'Financial Accounting',
				'description' => ''
			),
			array(
				'name' => 'Managerial Accounting',
				'description' => ''
			),
			array(
				'name' => 'The Accounting Environment',
				'description' => ''
			),
			array(
				'name' => 'Financial Reporting I',
				'description' => ''
			),
			array(
				'name' => 'Financial Reporting II',
				'description' => ''
			),
			array(
				'name' => 'Cost Management and Control',
				'description' => ''
			),
			array(
				'name' => 'Auditing in the Gaming Industry',
				'description' => ''
			),
			array(
				'name' => 'Governmental and NotforProfit Accounting',
				'description' => ''
			),
			array(
				'name' => 'Accounting Information Systems',
				'description' => ''
			),
			array(
				'name' => 'Federal Taxation',
				'description' => ''
			),
			array(
				'name' => 'Fraud Examination',
				'description' => ''
			),
			array(
				'name' => 'Internal Auditing',
				'description' => ''
			),
			array(
				'name' => 'International Accounting',
				'description' => ''
			),
			array(
				'name' => 'Auditing and Assurance Services',
				'description' => ''
			),
			array(
				'name' => 'Law for Accountants I',
				'description' => ''
			),
			array(
				'name' => 'Accounting Internship',
				'description' => ''
			),
			array(
				'name' => 'Foundations of the United States Air Force I',
				'description' => ''
			),
			array(
				'name' => 'AFROTC Leadership Lab',
				'description' => ''
			),
			array(
				'name' => 'Foundations of the United States Air Force II',
				'description' => ''
			),
			array(
				'name' => 'AFROTC Leadership Lab I',
				'description' => ''
			),
			array(
				'name' => 'Evolution of USAF Air and Space Power I',
				'description' => ''
			),
			array(
				'name' => 'AFROTC Leadership Lab II',
				'description' => ''
			),
			array(
				'name' => 'Evolution of USAF Air and Space Power II',
				'description' => ''
			),
			array(
				'name' => 'Air Force Leadership Studies I',
				'description' => ''
			),
			array(
				'name' => 'AFROTC Leadership Lab IIIA',
				'description' => ''
			),
			array(
				'name' => 'Air Force Leadership Studies II',
				'description' => ''
			),
			array(
				'name' => 'AFROTC Leadership Lab III',
				'description' => ''
			),
			array(
				'name' => 'National Security Affairs/Preparation for Active Duty I',
				'description' => ''
			),
			array(
				'name' => 'National Security Affairs/Preparation for Active Duty II',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Asian Studies',
				'description' => ''
			),
			array(
				'name' => 'Selected Topics in Asian Studies',
				'description' => ''
			),
			array(
				'name' => 'Explorations in South Asian Religions',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Cultural Anthropology',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Physical Anthropology',
				'description' => ''
			),
			array(
				'name' => 'Great Discoveries in Archaeology',
				'description' => ''
			),
			array(
				'name' => 'Introduction to World Archaeology',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Anthropological Linguistics',
				'description' => ''
			),
			array(
				'name' => 'Physical Anthropology Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Essentials of Data Analysis for Anthropologists',
				'description' => ''
			),
			array(
				'name' => 'Peoples and Cultures of Native North America',
				'description' => ''
			),
			array(
				'name' => 'Arctic Anthropology',
				'description' => ''
			),
			array(
				'name' => 'Contemporary Chinese Society',
				'description' => ''
			),
			array(
				'name' => 'Cultural Resources Management',
				'description' => ''
			),
			array(
				'name' => 'Cultures of Exploitation, Slavery, and Terrorism',
				'description' => ''
			),
			array(
				'name' => 'A Global Crisis: Food, Human Health, and Climate',
				'description' => ''
			),
			array(
				'name' => 'Dogs, Cats and Other Beasts: Anthropology of Animals',
				'description' => ''
			),
			array(
				'name' => 'Bones, Bodies and Trauma: Forensic Studies in Anthropology',
				'description' => ''
			),
			array(
				'name' => 'Youth Languages',
				'description' => ''
			),
			array(
				'name' => 'Native Americans of the Southwest',
				'description' => ''
			),
			array(
				'name' => 'Anthropology of Women and Men',
				'description' => ''
			),
			array(
				'name' => 'Economic Anthropology',
				'description' => ''
			),
			array(
				'name' => 'Buddhism and Culture',
				'description' => ''
			),
			array(
				'name' => 'Evolution & Culture: \'Darwinian\' models of culture',
				'description' => ''
			),
			array(
				'name' => 'Magic, Witchcraft, and Religion',
				'description' => ''
			),
			array(
				'name' => 'Psychological Anthropology',
				'description' => ''
			),
			array(
				'name' => 'Medical Anthropology',
				'description' => ''
			),
			array(
				'name' => 'Cultures and Cognition',
				'description' => ''
			),
			array(
				'name' => 'Signifying Identities: Ethnicity, Nationality, Gender, and Class',
				'description' => ''
			),
			array(
				'name' => 'Anthropology and Ecology',
				'description' => ''
			),
			array(
				'name' => 'Ethnohistory',
				'description' => ''
			),
			array(
				'name' => 'History of Anthropology',
				'description' => ''
			),
			array(
				'name' => 'Ethnographic Field Methods',
				'description' => ''
			),
			array(
				'name' => 'Archaeology of North America',
				'description' => ''
			),
			array(
				'name' => 'Archaeology of the Great Basin',
				'description' => ''
			),
			array(
				'name' => 'Archaeology of the Southwest',
				'description' => ''
			),
			array(
				'name' => 'Near Eastern and Mediterranean Prehistory',
				'description' => ''
			),
			array(
				'name' => 'Peoples and Cultures of Ancient Near East',
				'description' => ''
			),
			array(
				'name' => 'Environmental Archaeology',
				'description' => ''
			),
			array(
				'name' => 'Bioarchaeology',
				'description' => ''
			),
			array(
				'name' => 'Archaeological Field Methods',
				'description' => ''
			),
			array(
				'name' => 'Archaeological Field Practicum',
				'description' => ''
			),
			array(
				'name' => 'Ceramic Analysis in Archaeology',
				'description' => ''
			),
			array(
				'name' => 'Lithic Artifact Analysis',
				'description' => ''
			),
			array(
				'name' => 'Zooarchaeology Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Archaeological Theory',
				'description' => ''
			),
			array(
				'name' => 'Archaeology of Technology',
				'description' => ''
			),
			array(
				'name' => 'Archaeology of Complex Societies and Archaic States',
				'description' => ''
			),
			array(
				'name' => 'Origins of Inequality: A Cross-cultural Perspective',
				'description' => ''
			),
			array(
				'name' => 'Primate Evolution',
				'description' => ''
			),
			array(
				'name' => 'Human Osteology',
				'description' => ''
			),
			array(
				'name' => 'Dental Anthropology',
				'description' => ''
			),
			array(
				'name' => 'Human Growth and Aging',
				'description' => ''
			),
			array(
				'name' => 'Nutritional Anthropology',
				'description' => ''
			),
			array(
				'name' => 'Health and Disease in Antiquity',
				'description' => ''
			),
			array(
				'name' => 'Evolution and Biology of Human Behavior',
				'description' => ''
			),
			array(
				'name' => 'Evolution of Human Sexuality',
				'description' => ''
			),
			array(
				'name' => 'Hormones and Behavior',
				'description' => ''
			),
			array(
				'name' => 'Anthropology of Violence',
				'description' => ''
			),
			array(
				'name' => 'Evolutionary Medicine',
				'description' => ''
			),
			array(
				'name' => 'Language and Culture',
				'description' => ''
			),
			array(
				'name' => 'Language and Gender',
				'description' => ''
			),
			array(
				'name' => 'Study in Anthropology Abroad',
				'description' => ''
			),
			array(
				'name' => 'Internship in Anthropology',
				'description' => ''
			),
			array(
				'name' => 'Drawing I',
				'description' => ''
			),
			array(
				'name' => 'Drawing II',
				'description' => ''
			),
			array(
				'name' => 'Design Fundamentals I',
				'description' => ''
			),
			array(
				'name' => 'Design Fundamentals II-3D',
				'description' => ''
			),
			array(
				'name' => 'Photography I',
				'description' => ''
			),
			array(
				'name' => 'Design Fundamentals III',
				'description' => ''
			),
			array(
				'name' => 'Art Appreciation',
				'description' => ''
			),
			array(
				'name' => 'Life Drawing I',
				'description' => ''
			),
			array(
				'name' => 'Beginning Ceramics I',
				'description' => ''
			),
			array(
				'name' => 'Beginning Ceramics II',
				'description' => ''
			),
			array(
				'name' => 'Sculpture I',
				'description' => ''
			),
			array(
				'name' => 'Beginning Printmaking: Intaglio',
				'description' => ''
			),
			array(
				'name' => 'Beginning Printmaking: Lithography',
				'description' => ''
			),
			array(
				'name' => 'Beginning Printmaking: Serigraphy',
				'description' => ''
			),
			array(
				'name' => 'Painting I',
				'description' => ''
			),
			array(
				'name' => 'Digital Imaging I',
				'description' => ''
			),
			array(
				'name' => 'Graphic Design I',
				'description' => ''
			),
			array(
				'name' => 'Survey of Art History I',
				'description' => ''
			),
			array(
				'name' => 'Survey of Art History II',
				'description' => ''
			),
			array(
				'name' => 'Survey of Art History III',
				'description' => ''
			),
			array(
				'name' => 'Gallery Practices',
				'description' => ''
			),
			array(
				'name' => 'Intermediate Sculpture',
				'description' => ''
			),
			array(
				'name' => 'Intermediate Painting',
				'description' => ''
			),
			array(
				'name' => 'Intermediate Black and White Photography',
				'description' => ''
			),
			array(
				'name' => 'Beginning Color Photography',
				'description' => ''
			),
			array(
				'name' => 'Digital Photography',
				'description' => ''
			),
			array(
				'name' => 'Intermediate Digital Imaging',
				'description' => ''
			),
			array(
				'name' => 'Beginning Commercial Photography',
				'description' => ''
			),
			array(
				'name' => 'Graphic Design II',
				'description' => ''
			),
			array(
				'name' => 'Typography',
				'description' => ''
			),
			array(
				'name' => 'Interface Design',
				'description' => ''
			),
			array(
				'name' => 'Publication Design',
				'description' => ''
			),
			array(
				'name' => '4D for Graphic Design',
				'description' => ''
			),
			array(
				'name' => 'Advanced Drawing',
				'description' => ''
			),
			array(
				'name' => 'Life Drawing Workshop',
				'description' => ''
			),
			array(
				'name' => 'Art in Public Places',
				'description' => ''
			),
			array(
				'name' => 'Advanced Gallery Practices I',
				'description' => ''
			),
			array(
				'name' => 'Advanced Gallery Practices II',
				'description' => ''
			),
			array(
				'name' => 'Advanced Ceramics I',
				'description' => ''
			),
			array(
				'name' => 'Advanced Ceramics II',
				'description' => ''
			),
			array(
				'name' => 'Advanced Sculpture',
				'description' => ''
			),
			array(
				'name' => 'Foundry Sculpture',
				'description' => ''
			),
			array(
				'name' => 'Advanced Printmaking: Intaglio',
				'description' => ''
			),
			array(
				'name' => 'Advanced Printmaking: Lithography',
				'description' => ''
			),
			array(
				'name' => 'Advanced Printmaking: Serigraphy',
				'description' => ''
			),
			array(
				'name' => 'Advanced Studio Practice',
				'description' => ''
			),
			array(
				'name' => 'Water-based Media',
				'description' => ''
			),
			array(
				'name' => 'Entertainment and Fine Arts Law I',
				'description' => ''
			),
			array(
				'name' => 'Advanced Painting',
				'description' => ''
			),
			array(
				'name' => 'Topics in Contemporary Art',
				'description' => ''
			),
			array(
				'name' => 'Alternative Photographic Processes',
				'description' => ''
			),
			array(
				'name' => 'Advanced Black and White Photography',
				'description' => ''
			),
			array(
				'name' => 'Color Photography II',
				'description' => ''
			),
			array(
				'name' => 'Intermedia',
				'description' => ''
			),
			array(
				'name' => 'Senior Portfolio',
				'description' => ''
			),
			array(
				'name' => 'Advanced Typography',
				'description' => ''
			),
			array(
				'name' => 'Motion Graphics',
				'description' => ''
			),
			array(
				'name' => 'Graphic Design III',
				'description' => ''
			),
			array(
				'name' => 'Advanced Graphic Design',
				'description' => ''
			),
			array(
				'name' => 'The History of Ancient Art',
				'description' => ''
			),
			array(
				'name' => 'History of Medieval Art',
				'description' => ''
			),
			array(
				'name' => 'History of Early Renaissance Art',
				'description' => ''
			),
			array(
				'name' => 'High Renaissance and Mannerist Art',
				'description' => ''
			),
			array(
				'name' => 'History of Northern Renaissance Art',
				'description' => ''
			),
			array(
				'name' => 'History of Southern Baroque Art',
				'description' => ''
			),
			array(
				'name' => 'History of Northern Baroque Art',
				'description' => ''
			),
			array(
				'name' => 'History of Eighteenth-Century Art I',
				'description' => ''
			),
			array(
				'name' => 'History of Eighteenth-Century Art II',
				'description' => ''
			),
			array(
				'name' => 'History of Art in the Nineteenth Century',
				'description' => ''
			),
			array(
				'name' => 'Twentieth Century Art',
				'description' => ''
			),
			array(
				'name' => 'History of American Art',
				'description' => ''
			),
			array(
				'name' => 'History of Photography',
				'description' => ''
			),
			array(
				'name' => 'Topics in Performance and Media Art',
				'description' => ''
			),
			array(
				'name' => 'Art Since',
				'description' => ''
			),
			array(
				'name' => 'Artistic Traditions of the Southwest',
				'description' => ''
			),
			array(
				'name' => 'Art of China',
				'description' => ''
			),
			array(
				'name' => 'Art of Japan',
				'description' => ''
			),
			array(
				'name' => 'Contemporary Artists in Context',
				'description' => ''
			),
			array(
				'name' => 'Art History Internship',
				'description' => ''
			),
			array(
				'name' => 'Studio Internship',
				'description' => ''
			),
			array(
				'name' => 'Individual Studies',
				'description' => ''
			),
			array(
				'name' => 'Individual Study in Art History',
				'description' => ''
			),
			array(
				'name' => 'Special Topics in Art History',
				'description' => ''
			),
			array(
				'name' => 'Bachelor of Fine Arts Seminar',
				'description' => ''
			),
			array(
				'name' => 'Bachelor of Fine Arts Project',
				'description' => ''
			),
			array(
				'name' => 'Seminar in the Visual Arts',
				'description' => ''
			),
			array(
				'name' => 'Topics in Astronomy: White Dwarfs, Neutron Stars, and Black Holes',
				'description' => ''
			),
			array(
				'name' => 'Introductory Astronomy: The Solar System',
				'description' => ''
			),
			array(
				'name' => 'Introductory Astronomy: Stars and Galaxies',
				'description' => ''
			),
			array(
				'name' => 'Introductory Astronomy Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Projects in Observational Astronomy',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Astrophysics',
				'description' => ''
			),
			array(
				'name' => 'Special Topics in Astrophysics',
				'description' => ''
			),
			array(
				'name' => 'Entrepreneurial Creativity',
				'description' => ''
			),
			array(
				'name' => 'Innovation and Teams',
				'description' => ''
			),
			array(
				'name' => 'Starting Entrepreneurial Organizations',
				'description' => ''
			),
			array(
				'name' => 'Growing Entrepreneurial Organizations',
				'description' => ''
			),
			array(
				'name' => 'International Entrepreneurship',
				'description' => ''
			),
			array(
				'name' => 'International Seminar',
				'description' => ''
			),
			array(
				'name' => 'Sustainability and Entrepreneurship',
				'description' => ''
			),
			array(
				'name' => 'Social Entrepreneurship',
				'description' => ''
			),
			array(
				'name' => 'General Biology for Non-Majors',
				'description' => ''
			),
			array(
				'name' => 'Biology Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Human Ecology',
				'description' => ''
			),
			array(
				'name' => 'Life in the Ocean',
				'description' => ''
			),
			array(
				'name' => 'Plants and People',
				'description' => ''
			),
			array(
				'name' => 'Human Nutrition',
				'description' => ''
			),
			array(
				'name' => 'Desert Plants',
				'description' => ''
			),
			array(
				'name' => 'Human Nutrition Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Natural History of the Desert Southwest',
				'description' => ''
			),
			array(
				'name' => 'Fundamentals of Life Science',
				'description' => ''
			),
			array(
				'name' => 'Principles of Modern Biology I',
				'description' => ''
			),
			array(
				'name' => 'Principles of Modern Biology II',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Human Genetics',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Ecological Principles',
				'description' => ''
			),
			array(
				'name' => 'Human Anatomy and Physiology I',
				'description' => ''
			),
			array(
				'name' => 'Human Anatomy and Physiology II',
				'description' => ''
			),
			array(
				'name' => 'General Microbiology',
				'description' => ''
			),
			array(
				'name' => 'Principles of Genetics',
				'description' => ''
			),
			array(
				'name' => 'Fossil Record',
				'description' => ''
			),
			array(
				'name' => 'Evolutionary Survey of Vascular Plants',
				'description' => ''
			),
			array(
				'name' => 'Molecular Genetics',
				'description' => ''
			),
			array(
				'name' => '4D - Molecular Genetics Discussion',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Conservation Biology',
				'description' => ''
			),
			array(
				'name' => 'Invertebrate Zoology',
				'description' => ''
			),
			array(
				'name' => 'Principles of Ecology',
				'description' => ''
			),
			array(
				'name' => 'Urban Horticulture',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Human Anatomy',
				'description' => ''
			),
			array(
				'name' => 'Microbiology',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Biomathematics I',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Biomathematics II',
				'description' => ''
			),
			array(
				'name' => 'Molecular Biology',
				'description' => ''
			),
			array(
				'name' => 'Virology',
				'description' => ''
			),
			array(
				'name' => 'Molecular Evolution',
				'description' => ''
			),
			array(
				'name' => 'Endocrinology',
				'description' => ''
			),
			array(
				'name' => 'Evolution',
				'description' => ''
			),
			array(
				'name' => 'Biochemical Adaptations',
				'description' => ''
			),
			array(
				'name' => 'Microbial Ecology',
				'description' => ''
			),
			array(
				'name' => 'Taxonomy of Vascular Plants',
				'description' => ''
			),
			array(
				'name' => 'Genomics',
				'description' => ''
			),
			array(
				'name' => 'Plant Anatomy',
				'description' => ''
			),
			array(
				'name' => 'Bryology',
				'description' => ''
			),
			array(
				'name' => 'Ichthyology',
				'description' => ''
			),
			array(
				'name' => 'Herpetology',
				'description' => ''
			),
			array(
				'name' => 'Ornithology',
				'description' => ''
			),
			array(
				'name' => 'Mammalogy',
				'description' => ''
			),
			array(
				'name' => 'Entomology',
				'description' => ''
			),
			array(
				'name' => 'Soil Plant Water Relations in Arid Environments',
				'description' => ''
			),
			array(
				'name' => 'Mammalian Physiology',
				'description' => ''
			),
			array(
				'name' => 'Field Ecology',
				'description' => ''
			),
			array(
				'name' => 'Principles of Plant Physiology with Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Principles of Plant Ecology',
				'description' => ''
			),
			array(
				'name' => 'Cell Physiology',
				'description' => ''
			),
			array(
				'name' => 'Advanced Comparative Animal Physiology',
				'description' => ''
			),
			array(
				'name' => 'Mammalian Physiology Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Comparative Nutrition',
				'description' => ''
			),
			array(
				'name' => 'Comparative Vertebrate Anatomy',
				'description' => ''
			),
			array(
				'name' => 'Comparative Behavioral Endocrinology',
				'description' => ''
			),
			array(
				'name' => 'Immunology',
				'description' => ''
			),
			array(
				'name' => 'Comparative Vertebrate Anatomy and Biomechanics',
				'description' => ''
			),
			array(
				'name' => 'Microbial Physiology',
				'description' => ''
			),
			array(
				'name' => 'Bacterial Pathogenesis',
				'description' => ''
			),
			array(
				'name' => 'Vertebrate Embryology',
				'description' => ''
			),
			array(
				'name' => 'Developmental Biology',
				'description' => ''
			),
			array(
				'name' => 'Histology',
				'description' => ''
			),
			array(
				'name' => 'Topics in Applied Microbiology',
				'description' => ''
			),
			array(
				'name' => 'Aquatic Ecology',
				'description' => ''
			),
			array(
				'name' => 'Advanced Topics in Cell and Molecular Biology',
				'description' => ''
			),
			array(
				'name' => 'Neurobiology',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Biological Modeling',
				'description' => ''
			),
			array(
				'name' => 'Advanced Cell Biology',
				'description' => ''
			),
			array(
				'name' => 'Microbial Genetics',
				'description' => ''
			),
			array(
				'name' => 'Animal Behavior',
				'description' => ''
			),
			array(
				'name' => 'Principles of Systematics',
				'description' => ''
			),
			array(
				'name' => 'Developmental Genetics',
				'description' => ''
			),
			array(
				'name' => 'Biogeography',
				'description' => ''
			),
			array(
				'name' => 'Undergraduate Research',
				'description' => ''
			),
			array(
				'name' => 'Undergraduate Seminar',
				'description' => ''
			),
			array(
				'name' => 'Biology Colloquium',
				'description' => ''
			),
			array(
				'name' => 'Advanced Topics in Modern Biology',
				'description' => ''
			),
			array(
				'name' => 'Scientific Presentations',
				'description' => ''
			),
			array(
				'name' => 'Instruction in Biological Sciences',
				'description' => ''
			),
			array(
				'name' => 'Personal Law',
				'description' => ''
			),
			array(
				'name' => 'Legal Environment',
				'description' => ''
			),
			array(
				'name' => 'Real Estate Law I',
				'description' => ''
			),
			array(
				'name' => 'International Business Law',
				'description' => ''
			),
			array(
				'name' => 'Real Estate Law II',
				'description' => ''
			),
			array(
				'name' => 'Construction Law',
				'description' => ''
			),
			array(
				'name' => 'Law of the Internet',
				'description' => ''
			),
			array(
				'name' => 'Business Law II',
				'description' => ''
			),
			array(
				'name' => 'Seminar in Current Business Law Topics',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Business',
				'description' => ''
			),
			array(
				'name' => 'Business Connections',
				'description' => ''
			),
			array(
				'name' => 'Current Issues in Business',
				'description' => ''
			),
			array(
				'name' => 'Business Internship',
				'description' => ''
			),
			array(
				'name' => 'Individual Study',
				'description' => ''
			),
			array(
				'name' => 'Strategy Management and Policy',
				'description' => ''
			),
			array(
				'name' => 'New Venture Creation and Strategy',
				'description' => ''
			),
			array(
				'name' => 'Global Business Strategy',
				'description' => ''
			),
			array(
				'name' => 'Interpersonal Skills in Human Services',
				'description' => ''
			),
			array(
				'name' => 'Multicultural Issues of Counseling',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Human Services Counseling',
				'description' => ''
			),
			array(
				'name' => 'Relationships Across the Lifespan',
				'description' => ''
			),
			array(
				'name' => 'Counseling Skills in Human Services',
				'description' => ''
			),
			array(
				'name' => 'Drugs and Behavior',
				'description' => ''
			),
			array(
				'name' => 'Perspectives on Addictions',
				'description' => ''
			),
			array(
				'name' => 'Prevention I: System Oriented Prevention Strategies and Programs',
				'description' => ''
			),
			array(
				'name' => 'Prevention II: Client Oriented Prevention Strategies and Programs',
				'description' => ''
			),
			array(
				'name' => 'Mental Illness and the Human Services Profession',
				'description' => ''
			),
			array(
				'name' => 'Ethical and Professional Issues in Human Services',
				'description' => ''
			),
			array(
				'name' => 'Field Experience in Human Services I',
				'description' => ''
			),
			array(
				'name' => 'Field Experience in Human Services II',
				'description' => ''
			),
			array(
				'name' => 'Counseling the Older Adult',
				'description' => ''
			),
			array(
				'name' => 'Eating Disorders: Etiology and Treatment',
				'description' => ''
			),
			array(
				'name' => 'Identification, Assessment, and Treatment of the Process Addictions',
				'description' => ''
			),
			array(
				'name' => 'Perspectives in Multicultural Counseling',
				'description' => ''
			),
			array(
				'name' => 'Identification and Assessment in Addictions',
				'description' => ''
			),
			array(
				'name' => 'Advanced Professional Issues in Addictions',
				'description' => ''
			),
			array(
				'name' => 'Problem Gambling Counseling I',
				'description' => ''
			),
			array(
				'name' => 'Problem Gambling Counseling II',
				'description' => ''
			),
			array(
				'name' => 'Child Centered Play Therapy in Counseling',
				'description' => ''
			),
			array(
				'name' => 'Trauma and Addiction',
				'description' => ''
			),
			array(
				'name' => 'Combat Trauma',
				'description' => ''
			),
			array(
				'name' => 'Treatment of Addictions',
				'description' => ''
			),
			array(
				'name' => 'Technology and the Internet in Social Science Research and Practice',
				'description' => ''
			),
			array(
				'name' => 'Prevention Strategies and Development Theories in Addictions',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Civil Engineering Design',
				'description' => ''
			),
			array(
				'name' => 'Elementary Surveying',
				'description' => ''
			),
			array(
				'name' => 'Ethics and Professional Practice of Engineering',
				'description' => ''
			),
			array(
				'name' => 'Cooperative Training I',
				'description' => ''
			),
			array(
				'name' => 'Statics',
				'description' => ''
			),
			array(
				'name' => 'Sustainability in Civil and Environmental Engineering',
				'description' => ''
			),
			array(
				'name' => 'Project Management and Professional Practice',
				'description' => ''
			),
			array(
				'name' => 'CAD Tools for Civil Engineering Design',
				'description' => ''
			),
			array(
				'name' => 'Cooperative Training II',
				'description' => ''
			),
			array(
				'name' => 'Soil Mechanics',
				'description' => ''
			),
			array(
				'name' => 'Soil Mechanics Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Building Structures I',
				'description' => ''
			),
			array(
				'name' => 'Civil Engineering Materials',
				'description' => ''
			),
			array(
				'name' => 'Civil Engineering Materials Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Transportation Engineering',
				'description' => ''
			),
			array(
				'name' => 'Fluid Mechanics',
				'description' => ''
			),
			array(
				'name' => 'Fluid Mechanics Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Engineering Mechanics of Deformable Bodies',
				'description' => ''
			),
			array(
				'name' => 'Engineering Mechanics of Deformable Bodies Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Structural Analysis I',
				'description' => ''
			),
			array(
				'name' => 'Open Channel Flow',
				'description' => ''
			),
			array(
				'name' => 'Hydrologic Analysis and Design',
				'description' => ''
			),
			array(
				'name' => 'Computer Applications in Environmental and Water Resources Engineering',
				'description' => ''
			),
			array(
				'name' => 'Engineering Project Management',
				'description' => ''
			),
			array(
				'name' => 'Highway Construction Materials',
				'description' => ''
			),
			array(
				'name' => 'Water Resources Engineering I',
				'description' => ''
			),
			array(
				'name' => 'Engineering Surveys',
				'description' => ''
			),
			array(
				'name' => 'Cooperative Training III',
				'description' => ''
			),
			array(
				'name' => 'Geological Engineering',
				'description' => ''
			),
			array(
				'name' => 'Rock Mechanics',
				'description' => ''
			),
			array(
				'name' => 'Foundations Engineering',
				'description' => ''
			),
			array(
				'name' => 'Engineering Geophysics',
				'description' => ''
			),
			array(
				'name' => 'Steel Structural Design',
				'description' => ''
			),
			array(
				'name' => 'Unit Operations and Processes in Environmental Engineering',
				'description' => ''
			),
			array(
				'name' => 'Unit Operations and Processes Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Water and Wastewater Quality Analysis',
				'description' => ''
			),
			array(
				'name' => 'Air Pollution Control Fundamentals',
				'description' => ''
			),
			array(
				'name' => 'Solid and Hazardous Wastes Engineering',
				'description' => ''
			),
			array(
				'name' => 'Water Treatment and Reuse',
				'description' => ''
			),
			array(
				'name' => 'Traffic Engineering',
				'description' => ''
			),
			array(
				'name' => 'Airport Design',
				'description' => ''
			),
			array(
				'name' => 'Geometric Design of Highways',
				'description' => ''
			),
			array(
				'name' => 'Computer Applications in Transportation Engineering',
				'description' => ''
			),
			array(
				'name' => 'GIS Applications in Civil Engineering',
				'description' => ''
			),
			array(
				'name' => 'Earthquake Engineering for Structures',
				'description' => ''
			),
			array(
				'name' => 'Design of Underground Structures',
				'description' => ''
			),
			array(
				'name' => 'Applied Finite Element Analysis',
				'description' => ''
			),
			array(
				'name' => 'Concrete Structure Design',
				'description' => ''
			),
			array(
				'name' => 'Design of Timber Structures',
				'description' => ''
			),
			array(
				'name' => 'Special Topics',
				'description' => ''
			),
			array(
				'name' => 'Civil Engineering Professional Practicum',
				'description' => ''
			),
			array(
				'name' => 'Civil Engineering Capstone Design',
				'description' => ''
			),
			array(
				'name' => 'Fundamentals of Engineering Examination Registration',
				'description' => ''
			),
			array(
				'name' => 'Fundamentals of Construction Management',
				'description' => ''
			),
			array(
				'name' => 'Fundamentals of Construction Science',
				'description' => ''
			),
			array(
				'name' => 'Construction Materials and Methods',
				'description' => ''
			),
			array(
				'name' => 'Quantity Surveying and Document Analysis',
				'description' => ''
			),
			array(
				'name' => 'Construction Engineering Mechanics',
				'description' => ''
			),
			array(
				'name' => 'Construction Practicum I',
				'description' => ''
			),
			array(
				'name' => 'Construction Safety',
				'description' => ''
			),
			array(
				'name' => 'Soils and Foundations for Construction',
				'description' => ''
			),
			array(
				'name' => 'Facility Systems Design and Construction I',
				'description' => ''
			),
			array(
				'name' => 'Facility Systems Design and Construction II',
				'description' => ''
			),
			array(
				'name' => 'Steel and Wood Design in Construction',
				'description' => ''
			),
			array(
				'name' => 'Concrete Design in Construction',
				'description' => ''
			),
			array(
				'name' => 'Construction Practicum II',
				'description' => ''
			),
			array(
				'name' => 'Temporary Construction Structures',
				'description' => ''
			),
			array(
				'name' => 'Construction Field Inspection',
				'description' => ''
			),
			array(
				'name' => 'Construction Estimating',
				'description' => ''
			),
			array(
				'name' => 'Construction Cost Control',
				'description' => ''
			),
			array(
				'name' => 'Construction Scheduling',
				'description' => ''
			),
			array(
				'name' => 'Heavy Construction Methods and Equipment',
				'description' => ''
			),
			array(
				'name' => 'Construction Management Practice',
				'description' => ''
			),
			array(
				'name' => 'Project Management',
				'description' => ''
			),
			array(
				'name' => 'Design-Build for Construction Management',
				'description' => ''
			),
			array(
				'name' => 'Quantitative Methods in Project Management',
				'description' => ''
			),
			array(
				'name' => 'Construction Automation',
				'description' => ''
			),
			array(
				'name' => 'Sustainable Construction',
				'description' => ''
			),
			array(
				'name' => 'Hazardous Waste Construction Operations',
				'description' => ''
			),
			array(
				'name' => 'Construction Site Water Management',
				'description' => ''
			),
			array(
				'name' => 'Construction Law and Contracts',
				'description' => ''
			),
			array(
				'name' => 'Special Topics in Construction Management',
				'description' => ''
			),
			array(
				'name' => 'First Year Symposia',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Environmental Design',
				'description' => ''
			),
			array(
				'name' => 'Survey of Dance',
				'description' => ''
			),
			array(
				'name' => 'Preparatory Chemistry',
				'description' => ''
			),
			array(
				'name' => 'Chemistry, Man, and Society',
				'description' => ''
			),
			array(
				'name' => 'Beginning Chemistry Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Chemistry',
				'description' => ''
			),
			array(
				'name' => 'Chemistry for the Health Sciences I',
				'description' => ''
			),
			array(
				'name' => 'Chemistry for the Health Sciences II',
				'description' => ''
			),
			array(
				'name' => 'General Chemistry I',
				'description' => ''
			),
			array(
				'name' => 'General Chemistry II',
				'description' => ''
			),
			array(
				'name' => 'Qualitative Analysis Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Freshman Independent Study in Chemistry',
				'description' => ''
			),
			array(
				'name' => 'Introductory Organic Chemistry',
				'description' => ''
			),
			array(
				'name' => 'Organic Chemistry I',
				'description' => ''
			),
			array(
				'name' => 'Organic Chemistry for Life Sciences Lab I',
				'description' => ''
			),
			array(
				'name' => 'Organic Chemistry II',
				'description' => ''
			),
			array(
				'name' => 'Organic Chemistry for Life Sciences Laboratory II',
				'description' => ''
			),
			array(
				'name' => 'Chemistry Demonstrations for Science Teachers',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Radiochemistry',
				'description' => ''
			),
			array(
				'name' => 'Laboratory Techniques of Organic Chemistry I',
				'description' => ''
			),
			array(
				'name' => 'Laboratory Techniques of Organic Chemistry II',
				'description' => ''
			),
			array(
				'name' => 'Quantitative Analysis',
				'description' => ''
			),
			array(
				'name' => 'Quantitative Analysis Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Scientific Software for the Microcomputer',
				'description' => ''
			),
			array(
				'name' => 'Physical Chemistry I',
				'description' => ''
			),
			array(
				'name' => 'Physical Chemistry II',
				'description' => ''
			),
			array(
				'name' => 'Physical Chemistry Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Quantum Chemistry',
				'description' => ''
			),
			array(
				'name' => 'Advanced Inorganic Chemistry',
				'description' => ''
			),
			array(
				'name' => 'Advanced Organic Chemistry',
				'description' => ''
			),
			array(
				'name' => 'Advanced Synthesis Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Instrumental Analysis',
				'description' => ''
			),
			array(
				'name' => 'Instrumental Analysis Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Biochemistry Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Biochemistry I',
				'description' => ''
			),
			array(
				'name' => 'Biochemistry II',
				'description' => ''
			),
			array(
				'name' => 'Advanced Topics in Biochemistry',
				'description' => ''
			),
			array(
				'name' => 'Senior Poster Seminar',
				'description' => ''
			),
			array(
				'name' => 'Senior Independent Study in Chemistry',
				'description' => ''
			),
			array(
				'name' => 'Senior Seminar in Chemistry',
				'description' => ''
			),
			array(
				'name' => 'Advanced Topics in Chemistry',
				'description' => ''
			),
			array(
				'name' => 'Senior Research in Chemistry I',
				'description' => ''
			),
			array(
				'name' => 'Senior Research in Chemistry II',
				'description' => ''
			),
			array(
				'name' => 'Chinese Business Culture',
				'description' => ''
			),
			array(
				'name' => 'Elementary Chinese I',
				'description' => ''
			),
			array(
				'name' => 'Elementary Chinese II',
				'description' => ''
			),
			array(
				'name' => 'Study Abroad in Foreign Language, Literature, or Culture I',
				'description' => ''
			),
			array(
				'name' => 'Intermediate Chinese I',
				'description' => ''
			),
			array(
				'name' => 'Intermediate Chinese II',
				'description' => ''
			),
			array(
				'name' => 'Study Abroad in Foreign Language, Literature, or Culture II',
				'description' => ''
			),
			array(
				'name' => 'Third-Year Chinese: Conversation and Composition',
				'description' => ''
			),
			array(
				'name' => 'Third-Year Chinese: Grammar and Composition',
				'description' => ''
			),
			array(
				'name' => 'Modern Chinese Literature in Translation',
				'description' => ''
			),
			array(
				'name' => 'Chinese Popular Culture',
				'description' => ''
			),
			array(
				'name' => 'Chinese Literature in Translation',
				'description' => ''
			),
			array(
				'name' => 'Topics in Chinese Literature',
				'description' => ''
			),
			array(
				'name' => 'Study Abroad in Foreign Language, Literature, or Culture III',
				'description' => ''
			),
			array(
				'name' => 'Modern Chinese Culture Through Film',
				'description' => ''
			),
			array(
				'name' => 'Study Abroad in Foreign Language, Literature, or Culture IV',
				'description' => ''
			),
			array(
				'name' => 'First Year Seminar',
				'description' => ''
			),
			array(
				'name' => 'Independent Readings in the Classical Languages',
				'description' => ''
			),
			array(
				'name' => 'Classical Drama in Translation',
				'description' => ''
			),
			array(
				'name' => 'Urinalysis and Body Fluid Analysis',
				'description' => ''
			),
			array(
				'name' => 'Urinalysis and Body Fluid Analysis Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Clinical Laboratory Science and Safety',
				'description' => ''
			),
			array(
				'name' => 'Laboratory Operations I',
				'description' => ''
			),
			array(
				'name' => 'Independent Study I',
				'description' => ''
			),
			array(
				'name' => 'Principles of Laboratory Specimen Collection and Processing',
				'description' => ''
			),
			array(
				'name' => 'Specimen Collection Clinical Practicum',
				'description' => ''
			),
			array(
				'name' => 'Laboratory and Hospital Safety',
				'description' => ''
			),
			array(
				'name' => 'Clinical Immunology',
				'description' => ''
			),
			array(
				'name' => 'Clinical Immunology Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Transfusion Medicine Immunohematology',
				'description' => ''
			),
			array(
				'name' => 'Transfusion Medicine Immunohematology Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Clinical Hematology I',
				'description' => ''
			),
			array(
				'name' => 'Clinical Hematology I Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Clinical Hematology II',
				'description' => ''
			),
			array(
				'name' => 'Clinical Hematology II Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Clinical Microbiology I',
				'description' => ''
			),
			array(
				'name' => 'Clinical Microbiology Laboratory I',
				'description' => ''
			),
			array(
				'name' => 'Clinical Microbiology II',
				'description' => ''
			),
			array(
				'name' => 'Clinical Microbiology Laboratory II',
				'description' => ''
			),
			array(
				'name' => 'Clinical Chemistry I',
				'description' => ''
			),
			array(
				'name' => 'Clinical Chemistry Laboratory I',
				'description' => ''
			),
			array(
				'name' => 'Clinical Chemistry II',
				'description' => ''
			),
			array(
				'name' => 'Clinical Chemistry Laboratory II',
				'description' => ''
			),
			array(
				'name' => 'Laboratory Operations II',
				'description' => ''
			),
			array(
				'name' => 'Senior Seminar in Clinical Laboratory Sciences',
				'description' => ''
			),
			array(
				'name' => 'Clinical Practicum in Hematology and Body Fluids',
				'description' => ''
			),
			array(
				'name' => 'Clinical Practicum in Chemistry/Immunology/Urinalysis',
				'description' => ''
			),
			array(
				'name' => 'Clinical Practicum in Immunohematology',
				'description' => ''
			),
			array(
				'name' => 'Clinical Practicum in Microbiology',
				'description' => ''
			),
			array(
				'name' => 'Advanced Clinical Practicum',
				'description' => ''
			),
			array(
				'name' => 'Research Methods and Design',
				'description' => ''
			),
			array(
				'name' => 'Undergraduate Teaching Assistant in CLS',
				'description' => ''
			),
			array(
				'name' => 'Independent Study II',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Magnetic Resonance Imaging',
				'description' => ''
			),
			array(
				'name' => 'Principles of Magnetic Resonance Imaging',
				'description' => ''
			),
			array(
				'name' => 'Magnetic Resonance Imaging Pathology',
				'description' => ''
			),
			array(
				'name' => 'Ultrasound Physics and Instrumentation',
				'description' => ''
			),
			array(
				'name' => 'Abdominal Ultrasound',
				'description' => ''
			),
			array(
				'name' => 'Obstetric Ultrasound',
				'description' => ''
			),
			array(
				'name' => 'Gynecologic Ultrasound',
				'description' => ''
			),
			array(
				'name' => 'Vascular Ultrasound',
				'description' => ''
			),
			array(
				'name' => 'Ultrasound Practicum',
				'description' => ''
			),
			array(
				'name' => 'Principles of Computed Tomography',
				'description' => ''
			),
			array(
				'name' => 'Computed Tomography Pathology',
				'description' => ''
			),
			array(
				'name' => 'Sectional Anatomy in Medical Imaging',
				'description' => ''
			),
			array(
				'name' => 'Advanced Topics and Management',
				'description' => ''
			),
			array(
				'name' => 'Digital Data Management',
				'description' => ''
			),
			array(
				'name' => 'Imaging Case Reviews',
				'description' => ''
			),
			array(
				'name' => 'Comprehensive Medical Imaging Clinical Education',
				'description' => ''
			),
			array(
				'name' => 'Oral Communication',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Interpersonal Communication',
				'description' => ''
			),
			array(
				'name' => 'Intercollegiate Debate and Forensics',
				'description' => ''
			),
			array(
				'name' => 'Critical Reasoning in Daily Life',
				'description' => ''
			),
			array(
				'name' => 'Survey of Rhetorical Studies',
				'description' => ''
			),
			array(
				'name' => 'Survey of Communication Studies',
				'description' => ''
			),
			array(
				'name' => 'Argumentation and Debate',
				'description' => ''
			),
			array(
				'name' => 'Issues in Interpersonal Communication',
				'description' => ''
			),
			array(
				'name' => 'Contemporary Rhetorical Theory',
				'description' => ''
			),
			array(
				'name' => 'Nonverbal Communication',
				'description' => ''
			),
			array(
				'name' => 'Health Communication',
				'description' => ''
			),
			array(
				'name' => 'Small Group Communication',
				'description' => ''
			),
			array(
				'name' => 'Organizational Communication',
				'description' => ''
			),
			array(
				'name' => 'Selected Topics in Communication Studies',
				'description' => ''
			),
			array(
				'name' => 'Human Communication Theory',
				'description' => ''
			),
			array(
				'name' => 'Rhetoric of Women\'s Rights',
				'description' => ''
			),
			array(
				'name' => 'Public Communication',
				'description' => ''
			),
			array(
				'name' => 'Principles of Persuasion',
				'description' => ''
			),
			array(
				'name' => 'Intercollegiate Forensics',
				'description' => ''
			),
			array(
				'name' => 'Communication Between the Sexes',
				'description' => ''
			),
			array(
				'name' => 'Rhetorical Criticism',
				'description' => ''
			),
			array(
				'name' => 'The Rhetorical Tradition',
				'description' => ''
			),
			array(
				'name' => 'Advanced Topics in Relational Communication',
				'description' => ''
			),
			array(
				'name' => 'Intercultural Communication',
				'description' => ''
			),
			array(
				'name' => 'Argumentation',
				'description' => ''
			),
			array(
				'name' => 'Famous Speeches',
				'description' => ''
			),
			array(
				'name' => 'Communication in Marital and Family Relationships',
				'description' => ''
			),
			array(
				'name' => 'Communication and Conflict Resolution',
				'description' => ''
			),
			array(
				'name' => 'Quantitative Research Methods',
				'description' => ''
			),
			array(
				'name' => 'Rhetoric of Dissent',
				'description' => ''
			),
			array(
				'name' => 'Leadership: A Communication Perspective',
				'description' => ''
			),
			array(
				'name' => 'Security Discourse',
				'description' => ''
			),
			array(
				'name' => 'Political Communication',
				'description' => ''
			),
			array(
				'name' => 'Internship',
				'description' => ''
			),
			array(
				'name' => 'Computer Logic Design I',
				'description' => ''
			),
			array(
				'name' => 'Computer Logic Design I Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Computer Logic Design II',
				'description' => ''
			),
			array(
				'name' => 'Computer Logic Design II Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Signals and Systems for Computer Engineers',
				'description' => ''
			),
			array(
				'name' => 'Digital System Architecture and Design',
				'description' => ''
			),
			array(
				'name' => 'Digital Systems Design Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Microcontroller Based Systems',
				'description' => ''
			),
			array(
				'name' => 'Microcontroller Systems Design Laboratory for CpE',
				'description' => ''
			),
			array(
				'name' => 'Microcontroller Systems Design Laboratory for EE',
				'description' => ''
			),
			array(
				'name' => 'Computer Communications Networks',
				'description' => ''
			),
			array(
				'name' => 'Computer Communications Lab',
				'description' => ''
			),
			array(
				'name' => 'Embedded Systems',
				'description' => ''
			),
			array(
				'name' => 'Modern Processor Architecture',
				'description' => ''
			),
			array(
				'name' => 'Data Compression Systems',
				'description' => ''
			),
			array(
				'name' => 'Biometrics',
				'description' => ''
			),
			array(
				'name' => 'Digital Design Verification and Testing',
				'description' => ''
			),
			array(
				'name' => 'Digital System Design using Hardware Description Languages: HDL',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Administration of Justice',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Corrections',
				'description' => ''
			),
			array(
				'name' => 'Survey of Criminal Law',
				'description' => ''
			),
			array(
				'name' => 'The Juvenile Justice System',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Criminal Investigation',
				'description' => ''
			),
			array(
				'name' => 'Police in America',
				'description' => ''
			),
			array(
				'name' => 'Criminal Evidence',
				'description' => ''
			),
			array(
				'name' => 'Legal Method and Process',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Criminology',
				'description' => ''
			),
			array(
				'name' => 'Research Methods in Criminal Justice',
				'description' => ''
			),
			array(
				'name' => 'Quantitative Applications in Criminal Justice',
				'description' => ''
			),
			array(
				'name' => 'Forensic Science',
				'description' => ''
			),
			array(
				'name' => 'Community Policing and Problem Solving',
				'description' => ''
			),
			array(
				'name' => 'Hate Crimes',
				'description' => ''
			),
			array(
				'name' => 'Serial Killers and Sexual Predators',
				'description' => ''
			),
			array(
				'name' => 'Criminal Justice in Film',
				'description' => ''
			),
			array(
				'name' => 'Theories of Crime',
				'description' => ''
			),
			array(
				'name' => 'Crime Analysis',
				'description' => ''
			),
			array(
				'name' => 'History of Criminal Justice',
				'description' => ''
			),
			array(
				'name' => 'Law in Non-Western Societies',
				'description' => ''
			),
			array(
				'name' => 'Youth, Crime, and Society',
				'description' => ''
			),
			array(
				'name' => 'White Collar Crime',
				'description' => ''
			),
			array(
				'name' => 'Comparative Criminal Justice Systems',
				'description' => ''
			),
			array(
				'name' => 'Campus Crime',
				'description' => ''
			),
			array(
				'name' => 'Law and Society',
				'description' => ''
			),
			array(
				'name' => 'The Correctional Institution',
				'description' => ''
			),
			array(
				'name' => 'Women and Crime',
				'description' => ''
			),
			array(
				'name' => 'Gender and Crime',
				'description' => ''
			),
			array(
				'name' => 'Criminal Justice Process',
				'description' => ''
			),
			array(
				'name' => 'Jury Decision-Making',
				'description' => ''
			),
			array(
				'name' => 'Sociology of Law',
				'description' => ''
			),
			array(
				'name' => 'Delinquency Prevention and Control',
				'description' => ''
			),
			array(
				'name' => 'Social Inequality and Crime',
				'description' => ''
			),
			array(
				'name' => 'Social Science in Law',
				'description' => ''
			),
			array(
				'name' => 'Victims of Sex Crimes',
				'description' => ''
			),
			array(
				'name' => 'Police Administration',
				'description' => ''
			),
			array(
				'name' => 'Seminar in Criminal Justice',
				'description' => ''
			),
			array(
				'name' => 'Public Policy, Crime, and Criminal Justice',
				'description' => ''
			),
			array(
				'name' => 'Probation and Parole',
				'description' => ''
			),
			array(
				'name' => 'Psychology and the Legal System',
				'description' => ''
			),
			array(
				'name' => 'Special Topics in Law and Social Control',
				'description' => ''
			),
			array(
				'name' => 'Crime Prevention',
				'description' => ''
			),
			array(
				'name' => 'Internship in Criminal Justice',
				'description' => ''
			),
			array(
				'name' => 'Criminal Justice Senior Assessment',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Computers',
				'description' => ''
			),
			array(
				'name' => 'Programming for Scientists and Engineers',
				'description' => ''
			),
			array(
				'name' => 'Computer Science I',
				'description' => ''
			),
			array(
				'name' => 'Computing Languages',
				'description' => ''
			),
			array(
				'name' => 'Computer Science II',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Systems Programming',
				'description' => ''
			),
			array(
				'name' => 'Computer Organization',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Internet & World Wide Web',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Internet & World Wide Web – Lab',
				'description' => ''
			),
			array(
				'name' => 'Social Implications of Computer Technology',
				'description' => ''
			),
			array(
				'name' => 'Data Structures',
				'description' => ''
			),
			array(
				'name' => 'Programming Languages, Concepts and Implementation',
				'description' => ''
			),
			array(
				'name' => 'Internet Programming',
				'description' => ''
			),
			array(
				'name' => 'Internet Programming Lab',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Multimedia',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Multimedia Lab',
				'description' => ''
			),
			array(
				'name' => 'Operating Systems',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Computer Simulation',
				'description' => ''
			),
			array(
				'name' => 'Human-Computer Interaction',
				'description' => ''
			),
			array(
				'name' => 'Advanced Internet Programming',
				'description' => ''
			),
			array(
				'name' => 'Advanced Internet Programming Lab',
				'description' => ''
			),
			array(
				'name' => 'Internet Security',
				'description' => ''
			),
			array(
				'name' => 'Computer Security',
				'description' => ''
			),
			array(
				'name' => 'Multimedia Systems Design',
				'description' => ''
			),
			array(
				'name' => 'Multimedia Systems Design Laboratory',
				'description' => ''
			),
			array(
				'name' => 'Automata and Formal Languages',
				'description' => ''
			),
			array(
				'name' => 'Database Management Systems',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Data Mining',
				'description' => ''
			),
			array(
				'name' => 'Compiler Construction',
				'description' => ''
			),
			array(
				'name' => 'Computer Architecture',
				'description' => ''
			),
			array(
				'name' => 'Computer Networks I',
				'description' => ''
			),
			array(
				'name' => 'Computer Networks II',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Digital Image Processing',
				'description' => ''
			),
			array(
				'name' => 'Networks and Distributed Systems',
				'description' => ''
			),
			array(
				'name' => 'Program Derivation',
				'description' => ''
			),
			array(
				'name' => 'Software Product Design and Development I',
				'description' => ''
			),
			array(
				'name' => 'Software Product Design and Development II',
				'description' => ''
			),
			array(
				'name' => 'Decision Environments for Software Product Development',
				'description' => ''
			),
			array(
				'name' => 'Analysis of Algorithms',
				'description' => ''
			),
			array(
				'name' => 'Computer Graphics',
				'description' => ''
			),
			array(
				'name' => 'Artificial Intelligence',
				'description' => ''
			),
			array(
				'name' => 'Advanced Computer Science Topics',
				'description' => ''
			),
			array(
				'name' => 'Internship in Computer Science',
				'description' => ''
			),
			array(
				'name' => 'Senior Project Development I',
				'description' => ''
			),
			array(
				'name' => 'Senior Project Development II',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Dance',
				'description' => ''
			),
			array(
				'name' => 'Dance Appreciation',
				'description' => ''
			),
			array(
				'name' => 'Sex, Dance, and Entertainment',
				'description' => ''
			),
			array(
				'name' => 'Appreciation of Dance in Broadway and Film Musicals',
				'description' => ''
			),
			array(
				'name' => 'Pilates I',
				'description' => ''
			),
			array(
				'name' => 'Music Theory for Dancers I',
				'description' => ''
			),
			array(
				'name' => 'Dance for Flexibility and Tone',
				'description' => ''
			),
			array(
				'name' => 'Flamenco Dance I',
				'description' => ''
			),
			array(
				'name' => 'Country-Western and Square Dance',
				'description' => ''
			),
			array(
				'name' => 'Middle Eastern Dance I',
				'description' => ''
			),
			array(
				'name' => 'Hip Hop I',
				'description' => ''
			),
			array(
				'name' => 'Ballroom Dance (Beginning)',
				'description' => ''
			),
			array(
				'name' => 'Ballroom Dance (Beginning/Intermediate)',
				'description' => ''
			),
			array(
				'name' => 'Jazz Dance I',
				'description' => ''
			),
			array(
				'name' => 'Ballet I',
				'description' => ''
			),
			array(
				'name' => 'International Folk Dance',
				'description' => ''
			),
			array(
				'name' => 'Modern Dance I',
				'description' => ''
			),
			array(
				'name' => 'Tap Dance (Beginning)',
				'description' => ''
			),
			array(
				'name' => 'Survey of African American Dance',
				'description' => ''
			),
			array(
				'name' => 'Choreography I: Improvisation for Composition',
				'description' => ''
			),
			array(
				'name' => 'Seminar in Dance',
				'description' => ''
			),
			array(
				'name' => 'Pilates II',
				'description' => ''
			),
			array(
				'name' => 'Music Theory for Dancers II',
				'description' => ''
			),
			array(
				'name' => 'Flamenco Dance II',
				'description' => ''
			),
			array(
				'name' => 'Middle Eastern Dance II',
				'description' => ''
			),
			array(
				'name' => 'Hip Hop II',
				'description' => ''
			),
			array(
				'name' => 'Ballroom Dance (Intermediate)',
				'description' => ''
			),
			array(
				'name' => 'Ballroom Dance (Intermediate/Advanced)',
				'description' => ''
			),
			array(
				'name' => 'International Ballroom Dance',
				'description' => ''
			),
			array(
				'name' => 'Jazz Dance II',
				'description' => ''
			),
			array(
				'name' => 'Ballet II',
				'description' => ''
			),
			array(
				'name' => 'Modern Dance II',
				'description' => ''
			),
			array(
				'name' => 'Modern Dance (Intermediate/Advanced)',
				'description' => ''
			),
			array(
				'name' => 'Tap Dance (Intermediate)',
				'description' => ''
			),
			array(
				'name' => 'Prevention and Care of Dance Injuries',
				'description' => ''
			),
			array(
				'name' => 'Ballet History',
				'description' => ''
			),
			array(
				'name' => 'Dance in Elementary Education',
				'description' => ''
			),
			array(
				'name' => 'Choreography II: Elements of Dance Composition',
				'description' => ''
			),
			array(
				'name' => 'World Dance',
				'description' => ''
			),
			array(
				'name' => 'Composer-Choreographer Collaboration',
				'description' => ''
			),
			array(
				'name' => 'Pilates III',
				'description' => ''
			),
			array(
				'name' => 'Music Theory for Dancers III',
				'description' => ''
			),
			array(
				'name' => 'Ballroom Dance (Advanced)',
				'description' => ''
			),
			array(
				'name' => 'Jazz Dance III',
				'description' => ''
			),
			array(
				'name' => 'Ballet (Advanced)',
				'description' => ''
			),
			array(
				'name' => 'Modern Dance III',
				'description' => ''
			),
			array(
				'name' => 'Tap Dance (Advanced)',
				'description' => ''
			),
			array(
				'name' => 'Dance Kinesiology',
				'description' => ''
			),
			array(
				'name' => 'Dance History I: Dance History to 00',
				'description' => ''
			),
			array(
				'name' => 'Dance Production I',
				'description' => ''
			),
			array(
				'name' => 'Aesthetics of Design for Dance',
				'description' => ''
			),
			array(
				'name' => 'Sound Design for Dance',
				'description' => ''
			),
			array(
				'name' => 'Lighting Design for Dance I',
				'description' => ''
			),
			array(
				'name' => 'Costume Construction for Dance',
				'description' => ''
			),
			array(
				'name' => 'Scenic Design for Dance I',
				'description' => ''
			),
			array(
				'name' => 'Musical Theatre Dance Laboratory I',
				'description' => ''
			),
			array(
				'name' => 'Musical Theatre Dance',
				'description' => ''
			),
			array(
				'name' => 'Dance in Secondary Education',
				'description' => ''
			),
			array(
				'name' => 'Stage Management for Dance',
				'description' => ''
			),
			array(
				'name' => 'Bachelor of Fine Arts Project I',
				'description' => ''
			),
			array(
				'name' => 'Dance Ensemble I',
				'description' => ''
			),
			array(
				'name' => 'Choreography III: Principles of Composition',
				'description' => ''
			),
			array(
				'name' => 'Seminar in Dance Music',
				'description' => ''
			),
			array(
				'name' => 'Electronic Music for Dance',
				'description' => ''
			),
			array(
				'name' => 'Ballroom Formation Team',
				'description' => ''
			),
			array(
				'name' => 'Jazz Dance IV',
				'description' => ''
			),
			array(
				'name' => 'Ballet IV',
				'description' => ''
			),
			array(
				'name' => 'Modern Dance IV',
				'description' => ''
			),
			array(
				'name' => 'Tap Dance (Professional)',
				'description' => ''
			),
			array(
				'name' => 'Dance Notation and Movement Analysis',
				'description' => ''
			),
			array(
				'name' => 'Workshop in Dance',
				'description' => ''
			),
			array(
				'name' => 'Dance History II: 00 to Present',
				'description' => ''
			),
			array(
				'name' => 'Dance History III: Contemporary Trends',
				'description' => ''
			),
			array(
				'name' => 'Dance Production II',
				'description' => ''
			),
			array(
				'name' => 'Video Design for Dance',
				'description' => ''
			),
			array(
				'name' => 'Lighting Design for Dance II',
				'description' => ''
			),
			array(
				'name' => 'Costume Design for Dance',
				'description' => ''
			),
			array(
				'name' => 'Scenic Design for Dance II',
				'description' => ''
			),
			array(
				'name' => 'Musical Theatre Dance Laboratory II',
				'description' => ''
			),
			array(
				'name' => 'Production Lab',
				'description' => ''
			),
			array(
				'name' => 'Special Topics in Dance',
				'description' => ''
			),
			array(
				'name' => 'Methods of Teaching Dance',
				'description' => ''
			),
			array(
				'name' => 'Business of Dance',
				'description' => ''
			),
			array(
				'name' => 'DAN Women in the Performing Arts',
				'description' => ''
			),
			array(
				'name' => 'Feminist Issues in the Popular Arts',
				'description' => ''
			),
			array(
				'name' => 'Bachelor of Fine Arts Project II',
				'description' => ''
			),
			array(
				'name' => 'Dance Internship',
				'description' => ''
			),
			array(
				'name' => 'Dance Ensemble II',
				'description' => ''
			),
			array(
				'name' => 'Choreography IV: Theory and Practical Application',
				'description' => ''
			),
			array(
				'name' => 'Teaching Practicum',
				'description' => ''
			),
			array(
				'name' => 'Orientation to Early Childhood Education',
				'description' => ''
			),
			array(
				'name' => 'Curriculum in Early Childhood Education',
				'description' => ''
			),
			array(
				'name' => 'Infant/Toddler Curriculum',
				'description' => ''
			),
			array(
				'name' => 'Practicum for Infants/Toddlers',
				'description' => ''
			),
			array(
				'name' => 'Teaching Communications Skills to Young Children',
				'description' => ''
			),
			array(
				'name' => 'Play Theory, Creativity, and Aesthetics in Early Childhood Education',
				'description' => ''
			),
			array(
				'name' => 'Methods for Early Childhood Education I: Social Sciences',
				'description' => ''
			),
			array(
				'name' => 'Methods in Early Childhood Education II: Math and Science',
				'description' => ''
			),
			array(
				'name' => 'Positive Discipline in Early Childhood Programs',
				'description' => ''
			),
			array(
				'name' => 'Working with Families in Early Childhood Education',
				'description' => ''
			),
			array(
				'name' => 'Early Childhood Education Management',
				'description' => ''
			),
			array(
				'name' => 'Internship in Early Childhood Education Management/Administration',
				'description' => ''
			),
			array(
				'name' => 'Preschool Fieldwork in Early Childhood Education',
				'description' => ''
			),
			array(
				'name' => 'Pre-Student Teaching in Early Childhood Education',
				'description' => ''
			),
			array(
				'name' => 'Student Teaching in Early Childhood Education',
				'description' => ''
			),
			array(
				'name' => 'Student Teaching Seminar in Early Childhood Education',
				'description' => ''
			),
			array(
				'name' => 'Principles of Microeconomics',
				'description' => ''
			),
			array(
				'name' => 'Principles of Macroeconomics',
				'description' => ''
			),
			array(
				'name' => 'Current Economic Issues',
				'description' => ''
			),
			array(
				'name' => 'Economics for Teachers',
				'description' => ''
			),
			array(
				'name' => 'The Economics of Discrimination',
				'description' => ''
			),
			array(
				'name' => 'Global Economics',
				'description' => ''
			),
			array(
				'name' => 'Capitalism, Constitutions and American Ideals',
				'description' => ''
			),
			array(
				'name' => 'Applied Economics',
				'description' => ''
			),
			array(
				'name' => 'Principles of Statistics I',
				'description' => ''
			),
			array(
				'name' => 'Principles of Statistics II',
				'description' => ''
			),
			array(
				'name' => 'Intermediate Microeconomics',
				'description' => ''
			),
			array(
				'name' => 'Intermediate Macroeconomics',
				'description' => ''
			),
			array(
				'name' => 'Money and Banking',
				'description' => ''
			),
			array(
				'name' => 'Comparative Economic Systems',
				'description' => ''
			),
			array(
				'name' => 'Environmental Economics',
				'description' => ''
			),
			array(
				'name' => 'Resource Economics',
				'description' => ''
			),
			array(
				'name' => 'Health Economics',
				'description' => ''
			),
			array(
				'name' => 'Economics of Sport and Entertainment',
				'description' => ''
			),
			array(
				'name' => 'Economic History of the United States',
				'description' => ''
			),
			array(
				'name' => 'Government and Business',
				'description' => ''
			),
			array(
				'name' => 'International Economics',
				'description' => ''
			),
			array(
				'name' => 'Economic Development',
				'description' => ''
			),
			array(
				'name' => 'Labor Economics',
				'description' => ''
			),
			array(
				'name' => 'Topics of Microeconomics',
				'description' => ''
			),
			array(
				'name' => 'Topics in Macroeconomics',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Mathematical Economics',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Econometrics',
				'description' => ''
			),
			array(
				'name' => 'History of Economic Thought',
				'description' => ''
			),
			array(
				'name' => 'Public Finance',
				'description' => ''
			),
			array(
				'name' => 'Industrial Organization',
				'description' => ''
			),
			array(
				'name' => 'Law and Economics',
				'description' => ''
			),
			array(
				'name' => 'International Trade',
				'description' => ''
			),
			array(
				'name' => 'International Monetary Relations',
				'description' => ''
			),
			array(
				'name' => 'Urban and Regional Economics',
				'description' => ''
			),
			array(
				'name' => 'Managerial Economics',
				'description' => ''
			),
			array(
				'name' => 'Economics Internship',
				'description' => ''
			),
			array(
				'name' => 'Seminar in Economic Research',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Career and Technical Education',
				'description' => ''
			),
			array(
				'name' => 'Career and Technical Student Organizations',
				'description' => ''
			),
			array(
				'name' => 'Elementary Methods Practicum I',
				'description' => ''
			),
			array(
				'name' => 'Elementary Methods Practicum II',
				'description' => ''
			),
			array(
				'name' => 'Teaching and Learning Elementary Education',
				'description' => ''
			),
			array(
				'name' => 'Teaching Elementary School Art',
				'description' => ''
			),
			array(
				'name' => 'Curriculum and Assessment Elementary Education',
				'description' => ''
			),
			array(
				'name' => 'Classroom Management Elementary Education',
				'description' => ''
			),
			array(
				'name' => 'Standards-Based Curriculum Elementary Mathematics',
				'description' => ''
			),
			array(
				'name' => 'Teaching Elementary School Mathematics',
				'description' => ''
			),
			array(
				'name' => 'Teaching Elementary School Science',
				'description' => ''
			),
			array(
				'name' => 'Teaching Elementary School Social Studies',
				'description' => ''
			),
			array(
				'name' => 'Elementary Supervised Student Teaching',
				'description' => ''
			),
			array(
				'name' => 'Elementary Supervised Student Teaching Seminar',
				'description' => ''
			),
			array(
				'name' => 'Elementary Supervised Teaching Internship',
				'description' => ''
			),
			array(
				'name' => 'Elementary Supervised Internship Seminar',
				'description' => ''
			),
			array(
				'name' => 'Elementary Supervised Teaching Residency Student',
				'description' => ''
			),
			array(
				'name' => 'Elementary Supervised Residency Seminar',
				'description' => ''
			),
			array(
				'name' => 'Elementary Education Independent Study',
				'description' => ''
			),
			array(
				'name' => 'Elementary Education Topics:',
				'description' => ''
			),
			array(
				'name' => 'Teaching Middle School Mathematics',
				'description' => ''
			),
			array(
				'name' => 'Literacy Survey',
				'description' => ''
			),
			array(
				'name' => 'Children\'s Literature Elementary School Curriculum',
				'description' => ''
			),
			array(
				'name' => 'Literature for Young Adults',
				'description' => ''
			),
			array(
				'name' => 'Teaching Literature Secondary Schools',
				'description' => ''
			),
			array(
				'name' => 'Teaching Language Arts Elementary Schools',
				'description' => ''
			),
			array(
				'name' => 'Teaching Writing Secondary Schools',
				'description' => ''
			),
			array(
				'name' => 'Teaching Reading',
				'description' => ''
			),
			array(
				'name' => 'Literacy Instruction I',
				'description' => ''
			),
			array(
				'name' => 'Literacy Instruction II: Clinic-based',
				'description' => ''
			),
			array(
				'name' => 'Content Area Literacy Instruction',
				'description' => ''
			),
			array(
				'name' => 'Diagnosis Assessment and Instruction Literacy',
				'description' => ''
			),
			array(
				'name' => 'Literacy Practicum',
				'description' => ''
			),
			array(
				'name' => 'Language Acquisition, Development and Learning',
				'description' => ''
			),
			array(
				'name' => 'Methods for English Language Learners',
				'description' => ''
			),
			array(
				'name' => 'Secondary Methods Practicum I',
				'description' => ''
			),
			array(
				'name' => 'Secondary Methods Practicum II',
				'description' => ''
			),
			array(
				'name' => 'Teaching and Learning Secondary Education',
				'description' => ''
			),
			array(
				'name' => 'Classroom Management Secondary Education',
				'description' => ''
			),
			array(
				'name' => 'Teaching Secondary Arts: Art',
				'description' => ''
			),
			array(
				'name' => 'Teaching Secondary Arts: Theatre',
				'description' => ''
			),
			array(
				'name' => 'Teaching Secondary English',
				'description' => ''
			),
			array(
				'name' => 'Teaching Secondary Foreign/Second Language',
				'description' => ''
			),
			array(
				'name' => 'Teaching Secondary Mathematics',
				'description' => ''
			),
			array(
				'name' => 'Technology Applications Secondary Mathematics',
				'description' => ''
			),
			array(
				'name' => 'Teaching Secondary Science',
				'description' => ''
			),
			array(
				'name' => 'Technology Applications Secondary Science',
				'description' => ''
			),
			array(
				'name' => 'Teaching Secondary Social Studies',
				'description' => ''
			),
			array(
				'name' => 'Secondary Supervised Student Teaching',
				'description' => ''
			),
			array(
				'name' => 'Secondary Supervised Student Teaching: Major Field',
				'description' => ''
			),
			array(
				'name' => 'Secondary Supervised Student Teaching: Minor Field',
				'description' => ''
			),
			array(
				'name' => 'Secondary Supervised Student Teaching Seminar',
				'description' => ''
			),
			array(
				'name' => 'Secondary Supervised Teaching Internship',
				'description' => ''
			),
			array(
				'name' => 'Secondary Supervised Teaching Internship: Major Field',
				'description' => ''
			),
			array(
				'name' => 'Secondary Supervised Student Teaching Internship: Minor Field',
				'description' => ''
			),
			array(
				'name' => 'Secondary Supervised Internship Seminar',
				'description' => ''
			),
			array(
				'name' => 'Secondary Supervised Teaching Residency',
				'description' => ''
			),
			array(
				'name' => 'Secondary Supervised Teaching Residency: Major Field',
				'description' => ''
			),
			array(
				'name' => 'Secondary Supervised Teaching Residency: Minor Field',
				'description' => ''
			),
			array(
				'name' => 'Secondary Supervised Residency Seminar',
				'description' => ''
			),
			array(
				'name' => 'Secondary Education Independent Study',
				'description' => ''
			),
			array(
				'name' => 'Secondary Education Topics:',
				'description' => ''
			),
			array(
				'name' => 'Problems in Special Education',
				'description' => ''
			),
			array(
				'name' => 'Students with Disabilities in General Education Settings',
				'description' => ''
			),
			array(
				'name' => 'Foundations of Motor Skills',
				'description' => ''
			),
			array(
				'name' => 'Introduction to Adapted Physical Education',
				'description' => ''
			),
			array(
				'name' => 'Career Education for Students with Disabilities',
				'description' => ''
			),
			array(
				'name' => 'Second Language Pedagogy for Students in Inclusive Settings',
				'description' => ''
			),
			array(
				'name' => 'Education of Students with Emotional Disturbance',
				'description' => ''
			),
			array(
				'name' => 'Education of Students with Physical Disabilities',
				'description' => ''
			),
			array(
				'name' => 'Collaboration and Consultation in Special Education',
				'description' => ''
			),
			array(
				'name' => 'Legal Aspects of Special Education',
				'description' => ''
			),
			array(
				'name' => 'Serving Individuals with Disabilities and Their Families',
				'description' => ''
			),
			array(
				'name' => 'Characteristics and Inclusive Strategies for Students with Mild/Moderate Disabilities',
				'description' => ''
			),
			array(
				'name' => 'Curriculum Planning for English Language Learners With Diverse Needs',
				'description' => ''
			),
			array(
				'name' => 'Assessment of Diverse Learners with Disabilities in Inclusive Settings',
				'description' => ''
			),
			array(
				'name' => 'Behavior Management Techniques for Students with Disabilities',
				'description' => ''
			),
			array(
				'name' => 'Oral and Written Language Instruction for Students with Disabilities',
				'description' => ''
			),
			array(
				'name' => 'Math Methods for Students with Mild Disabilities',
				'description' => '',
			),
			array(
				'name' => 'Strategies for Students with Disabilities',
				'description' => '',
			),
			array(
				'name' => 'Student Growth Models and Data-Based Instructional Decision Making',
				'description' => '',
			),
			array(
				'name' => 'Group Teaching Methods for Students with Disabilities',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Early Childhood Special Education',
				'description' => '',
			),
			array(
				'name' => 'Developmental Assessment in Early Childhood Special Education',
				'description' => '',
			),
			array(
				'name' => 'Curriculum Development in Early Childhood Special Education',
				'description' => '',
			),
			array(
				'name' => 'Strategies for Teaching Young Children with Disabilities',
				'description' => '',
			),
			array(
				'name' => 'Practicum in a Resource Room',
				'description' => '',
			),
			array(
				'name' => 'Internship in Reading',
				'description' => '',
			),
			array(
				'name' => 'Pre-Student Teaching',
				'description' => '',
			),
			array(
				'name' => 'Pre-Student Teaching Seminar',
				'description' => '',
			),
			array(
				'name' => 'Student Teaching in Special Education',
				'description' => '',
			),
			array(
				'name' => 'Student Teaching Seminar',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Elementary Education',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Secondary Education',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Special Education',
				'description' => '',
			),
			array(
				'name' => 'Nevada School Law',
				'description' => '',
			),
			array(
				'name' => 'Preparing Teachers to Use Technology',
				'description' => '',
			),
			array(
				'name' => 'Valuing Cultural Diversity',
				'description' => '',
			),
			array(
				'name' => 'School Administration for the Pre-Service Teacher',
				'description' => '',
			),
			array(
				'name' => 'School Administration for the Layman and/or the Professional',
				'description' => '',
			),
			array(
				'name' => 'Education Topics:',
				'description' => '',
			),
			array(
				'name' => 'Special Problems in Administration and Supervision',
				'description' => '',
			),
			array(
				'name' => 'Workforce Skills and Content',
				'description' => '',
			),
			array(
				'name' => 'Curriculum Development in Workforce Education',
				'description' => '',
			),
			array(
				'name' => 'General Methods of Teaching Workforce Education',
				'description' => '',
			),
			array(
				'name' => 'Computer Uses in Workforce Education and Development',
				'description' => '',
			),
			array(
				'name' => 'Postsecondary/Adult Supervised Teaching',
				'description' => '',
			),
			array(
				'name' => 'Student Teaching - Workforce Education and Development',
				'description' => '',
			),
			array(
				'name' => 'Career Development and Work-Based Learning Strategies',
				'description' => '',
			),
			array(
				'name' => 'Advanced Workforce Skills and Content',
				'description' => '',
			),
			array(
				'name' => 'Workforce Education and Development Field Experience',
				'description' => '',
			),
			array(
				'name' => 'Independent Study in Workforce Education and Development',
				'description' => '',
			),
			array(
				'name' => 'Current Topics in Workforce Education and Development',
				'description' => '',
			),
			array(
				'name' => 'Electrical and Computer Engineering Freshman Design',
				'description' => '',
			),
			array(
				'name' => 'Circuits I',
				'description' => '',
			),
			array(
				'name' => 'Circuits I Discussion',
				'description' => '',
			),
			array(
				'name' => 'Circuits II',
				'description' => '',
			),
			array(
				'name' => 'Circuits II Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Fundamentals of Electrical & Computer Engineering',
				'description' => '',
			),
			array(
				'name' => 'Engineering Electronics I',
				'description' => '',
			),
			array(
				'name' => 'Engineering Electronics I Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Engineering Electromagnetics I',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Electrical Power Engineering',
				'description' => '',
			),
			array(
				'name' => 'Electric Power Engineering Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Signals and Systems I',
				'description' => '',
			),
			array(
				'name' => 'Signals and Systems I - Discussion',
				'description' => '',
			),
			array(
				'name' => 'Signals and Systems II',
				'description' => '',
			),
			array(
				'name' => 'Classical Feedback and Control Systems',
				'description' => '',
			),
			array(
				'name' => 'Feedback and Control Systems Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Engineering Electronics II',
				'description' => '',
			),
			array(
				'name' => 'Engineering Electronics II Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Digital Electronics',
				'description' => '',
			),
			array(
				'name' => 'Digital Electronics Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Analog Integrated Circuit Design',
				'description' => '',
			),
			array(
				'name' => 'Introduction to VLSI System Design',
				'description' => '',
			),
			array(
				'name' => 'EE Transmission Lines',
				'description' => '',
			),
			array(
				'name' => 'Engineering Optics',
				'description' => '',
			),
			array(
				'name' => 'Antenna Engineering',
				'description' => '',
			),
			array(
				'name' => 'Active and Passive Microwave Engineering',
				'description' => '',
			),
			array(
				'name' => 'Power Electronics',
				'description' => '',
			),
			array(
				'name' => 'Solid State Devices',
				'description' => '',
			),
			array(
				'name' => 'Solid State Characterization Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Electronic and Magnetic Materials and Devices',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Optical Electronics',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Nanotechnology',
				'description' => '',
			),
			array(
				'name' => 'Analog and Digital Communications',
				'description' => '',
			),
			array(
				'name' => 'Advanced Digital Communications',
				'description' => '',
			),
			array(
				'name' => 'Wireless and Mobile Communication Systems',
				'description' => '',
			),
			array(
				'name' => 'Digital Control Systems',
				'description' => '',
			),
			array(
				'name' => 'Digital Signal Processing',
				'description' => '',
			),
			array(
				'name' => 'Digital Signal Processing Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Biomedical Signals and Systems',
				'description' => '',
			),
			array(
				'name' => 'Fundamental Engineering Examination',
				'description' => '',
			),
			array(
				'name' => 'Senior Design Project I',
				'description' => '',
			),
			array(
				'name' => 'Senior Design Project II',
				'description' => '',
			),
			array(
				'name' => 'Entertainment Engineering and Design Seminar I',
				'description' => '',
			),
			array(
				'name' => 'Material Science and Fabrication Techniques',
				'description' => '',
			),
			array(
				'name' => 'Basic Kinetic Structures',
				'description' => '',
			),
			array(
				'name' => 'Intro to Entertainment Technologies for the Non-Major',
				'description' => '',
			),
			array(
				'name' => 'Entertainment Visualization',
				'description' => '',
			),
			array(
				'name' => 'Entertainment Engineering and Design Seminar II',
				'description' => '',
			),
			array(
				'name' => 'Multi-Media Design',
				'description' => '',
			),
			array(
				'name' => 'Design for Live Entertainment',
				'description' => '',
			),
			array(
				'name' => 'History of Entertainment and Technology',
				'description' => '',
			),
			array(
				'name' => 'Entertainment Engineering and Design Seminar III',
				'description' => '',
			),
			array(
				'name' => 'Product Design I',
				'description' => '',
			),
			array(
				'name' => 'Rigging and Structural Design Principles',
				'description' => '',
			),
			array(
				'name' => 'Programmable Systems for the Entertainment Industry',
				'description' => '',
			),
			array(
				'name' => 'Entertainment Engineering and Design Seminar IV',
				'description' => '',
			),
			array(
				'name' => 'Design Aesthetics in Entertainment Design',
				'description' => '',
			),
			array(
				'name' => 'Entertainment Product Design II',
				'description' => '',
			),
			array(
				'name' => 'Control Systems for the Entertainment Industry',
				'description' => '',
			),
			array(
				'name' => 'Rigging Systems for the Entertainment Industry',
				'description' => '',
			),
			array(
				'name' => 'Motion Capture',
				'description' => '',
			),
			array(
				'name' => 'Animatronics Techniques',
				'description' => '',
			),
			array(
				'name' => 'Entertainment Venue Design',
				'description' => '',
			),
			array(
				'name' => 'Special Topics in EED',
				'description' => '',
			),
			array(
				'name' => 'Internship in EED',
				'description' => '',
			),
			array(
				'name' => 'Supervised Individual Study',
				'description' => '',
			),
			array(
				'name' => 'Senior Design I',
				'description' => '',
			),
			array(
				'name' => 'Senior Design II',
				'description' => '',
			),
			array(
				'name' => 'People and Technology',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Engineering Experience',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Engineering Design',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Design Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Control of Environmental Pollution',
				'description' => '',
			),
			array(
				'name' => 'Quality Control and Quality Improvement Engineering',
				'description' => '',
			),
			array(
				'name' => 'Engineering Economics',
				'description' => '',
			),
			array(
				'name' => 'Engineering Law',
				'description' => '',
			),
			array(
				'name' => 'Mold Making and Casting',
				'description' => '',
			),
			array(
				'name' => 'Solar and Renewable Energy Utilization',
				'description' => '',
			),
			array(
				'name' => 'Ergonomics',
				'description' => '',
			),
			array(
				'name' => 'Technology Commercialization',
				'description' => '',
			),
			array(
				'name' => 'Preparatory Composition',
				'description' => '',
			),
			array(
				'name' => 'Composition I',
				'description' => '',
			),
			array(
				'name' => 'Composition I Extended I',
				'description' => '',
			),
			array(
				'name' => 'Composition I Extended II',
				'description' => '',
			),
			array(
				'name' => 'Composition II',
				'description' => '',
			),
			array(
				'name' => 'Composition I for International Students',
				'description' => '',
			),
			array(
				'name' => 'Composition I for International Students Extended I',
				'description' => '',
			),
			array(
				'name' => 'Composition I for International Students Extended II',
				'description' => '',
			),
			array(
				'name' => 'Composition II for International Students',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Literary Study',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Creative Writing: Fiction and Poetry',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Composition',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Semantics',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Linguistics',
				'description' => '',
			),
			array(
				'name' => 'World Literature I',
				'description' => '',
			),
			array(
				'name' => 'World Literature II',
				'description' => '',
			),
			array(
				'name' => 'Survey of English Literature I',
				'description' => '',
			),
			array(
				'name' => 'Survey of English Literature II',
				'description' => '',
			),
			array(
				'name' => 'Survey of American Literature I',
				'description' => '',
			),
			array(
				'name' => 'Survey of American Literature II',
				'description' => '',
			),
			array(
				'name' => 'Introduction to the Short Story',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Drama',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Contemporary Drama',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Poetry',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Shakespeare',
				'description' => '',
			),
			array(
				'name' => 'Contemporary Literature',
				'description' => '',
			),
			array(
				'name' => 'Readings in the Contemporary Novel',
				'description' => '',
			),
			array(
				'name' => 'Introduction to African-American Literature',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Chicano Literature',
				'description' => '',
			),
			array(
				'name' => 'Writing About Literature',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Literary Theory and Criticism',
				'description' => '',
			),
			array(
				'name' => 'Document Design',
				'description' => '',
			),
			array(
				'name' => 'Advanced Composition',
				'description' => '',
			),
			array(
				'name' => 'Advanced Creative Writing',
				'description' => '',
			),
			array(
				'name' => 'Research and Editing',
				'description' => '',
			),
			array(
				'name' => 'Writing for Publication',
				'description' => '',
			),
			array(
				'name' => 'Electronic Documents and Publications',
				'description' => '',
			),
			array(
				'name' => 'Fundamentals of Business Writing',
				'description' => '',
			),
			array(
				'name' => 'Fundamentals of Technical Writing',
				'description' => '',
			),
			array(
				'name' => 'Advanced Professional Communication',
				'description' => '',
			),
			array(
				'name' => 'Visual Rhetoric',
				'description' => '',
			),
			array(
				'name' => 'Rhetoric and the Environment',
				'description' => '',
			),
			array(
				'name' => 'Semantics',
				'description' => '',
			),
			array(
				'name' => 'Linguistics for English Majors',
				'description' => '',
			),
			array(
				'name' => 'Principles of Modern Grammar',
				'description' => '',
			),
			array(
				'name' => 'History of the English Language',
				'description' => '',
			),
			array(
				'name' => 'Development of American English',
				'description' => '',
			),
			array(
				'name' => 'Old English I',
				'description' => '',
			),
			array(
				'name' => 'Old English II',
				'description' => '',
			),
			array(
				'name' => 'Special Problems in English',
				'description' => '',
			),
			array(
				'name' => 'Topics in Literary Theory',
				'description' => '',
			),
			array(
				'name' => 'Modern Literature',
				'description' => '',
			),
			array(
				'name' => 'Themes of Literature',
				'description' => '',
			),
			array(
				'name' => 'Religion and Literature',
				'description' => '',
			),
			array(
				'name' => 'Mythology',
				'description' => '',
			),
			array(
				'name' => 'Gender and Literature',
				'description' => '',
			),
			array(
				'name' => 'Early American Humor',
				'description' => '',
			),
			array(
				'name' => 'Modern American Humor',
				'description' => '',
			),
			array(
				'name' => 'Literature of the American West',
				'description' => '',
			),
			array(
				'name' => 'Major Figures in British Literature',
				'description' => '',
			),
			array(
				'name' => 'Chaucer',
				'description' => '',
			),
			array(
				'name' => 'Shakespeare: Tragedies',
				'description' => '',
			),
			array(
				'name' => 'Shakespeare: Comedies and Histories',
				'description' => '',
			),
			array(
				'name' => 'Milton',
				'description' => '',
			),
			array(
				'name' => 'Major Figures in American Literature',
				'description' => '',
			),
			array(
				'name' => 'Medieval English Literature',
				'description' => '',
			),
			array(
				'name' => 'Gender and Early Literature',
				'description' => '',
			),
			array(
				'name' => 'The Renaissance',
				'description' => '',
			),
			array(
				'name' => 'Gender and Renaissance Literature',
				'description' => '',
			),
			array(
				'name' => 'The Seventeenth Century',
				'description' => '',
			),
			array(
				'name' => 'Restoration and Augustan Literature',
				'description' => '',
			),
			array(
				'name' => 'Later Eighteenth-Century Literature',
				'description' => '',
			),
			array(
				'name' => 'The Romantic Poets',
				'description' => '',
			),
			array(
				'name' => 'Victorian Poetry',
				'description' => '',
			),
			array(
				'name' => 'Nineteenth-Century Prose Writers',
				'description' => '',
			),
			array(
				'name' => 'Modern British Literature',
				'description' => '',
			),
			array(
				'name' => 'Gender and Modern British Literature',
				'description' => '',
			),
			array(
				'name' => 'British Literature I',
				'description' => '',
			),
			array(
				'name' => 'British Literature II',
				'description' => '',
			),
			array(
				'name' => 'American Literature I',
				'description' => '',
			),
			array(
				'name' => 'American Literature II',
				'description' => '',
			),
			array(
				'name' => 'American Literature',
				'description' => '',
			),
			array(
				'name' => 'American Literature, -Present',
				'description' => '',
			),
			array(
				'name' => 'Gender and Modern American Literature',
				'description' => '',
			),
			array(
				'name' => 'The American Short Story',
				'description' => '',
			),
			array(
				'name' => 'Heroic Epic',
				'description' => '',
			),
			array(
				'name' => 'The Study of Poetry and Poetics',
				'description' => '',
			),
			array(
				'name' => 'Modern British Poetry',
				'description' => '',
			),
			array(
				'name' => 'Modern American Poetry',
				'description' => '',
			),
			array(
				'name' => 'English Drama to',
				'description' => '',
			),
			array(
				'name' => 'Restoration and Eighteenth-Century Drama',
				'description' => '',
			),
			array(
				'name' => 'Nineteenth-Century Drama',
				'description' => '',
			),
			array(
				'name' => 'Modern British Drama',
				'description' => '',
			),
			array(
				'name' => 'Modern American Drama',
				'description' => '',
			),
			array(
				'name' => 'The British Novel l',
				'description' => '',
			),
			array(
				'name' => 'The British Novel II',
				'description' => '',
			),
			array(
				'name' => 'Modern English Novel',
				'description' => '',
			),
			array(
				'name' => 'Contemporary English Novel',
				'description' => '',
			),
			array(
				'name' => 'The Early American Novel',
				'description' => '',
			),
			array(
				'name' => 'The Modern American Novel',
				'description' => '',
			),
			array(
				'name' => 'The Contemporary American Novel',
				'description' => '',
			),
			array(
				'name' => 'Studies in British Film',
				'description' => '',
			),
			array(
				'name' => 'History of the American Film',
				'description' => '',
			),
			array(
				'name' => 'Film and Literature',
				'description' => '',
			),
			array(
				'name' => 'The American Hero in Film and Literature',
				'description' => '',
			),
			array(
				'name' => 'Genre Studies in Film',
				'description' => '',
			),
			array(
				'name' => 'Comparative Literature',
				'description' => '',
			),
			array(
				'name' => 'Modern Comparative Literature',
				'description' => '',
			),
			array(
				'name' => 'The Bible as Literature',
				'description' => '',
			),
			array(
				'name' => 'Asian Literature',
				'description' => '',
			),
			array(
				'name' => 'Postcolonial Theory',
				'description' => '',
			),
			array(
				'name' => 'Postcolonial Literature',
				'description' => '',
			),
			array(
				'name' => 'Environmental Literature',
				'description' => '',
			),
			array(
				'name' => 'Native-American Literature',
				'description' => '',
			),
			array(
				'name' => 'Early African-American Literature',
				'description' => '',
			),
			array(
				'name' => 'Modern African-American Literature',
				'description' => '',
			),
			array(
				'name' => 'Themes in Modern Chicano Literature',
				'description' => '',
			),
			array(
				'name' => 'Early Latino/a Literature',
				'description' => '',
			),
			array(
				'name' => 'Contemporary Latino/a Literature',
				'description' => '',
			),
			array(
				'name' => 'Humans and the Environment',
				'description' => '',
			),
			array(
				'name' => 'Science Seminars for Teachers',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Environmental Science',
				'description' => '',
			),
			array(
				'name' => 'Experiential Learning',
				'description' => '',
			),
			array(
				'name' => 'Environmental Regulations',
				'description' => '',
			),
			array(
				'name' => 'Environment and Development',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Climate Change',
				'description' => '',
			),
			array(
				'name' => 'Sustainable Urban Planning and Design',
				'description' => '',
			),
			array(
				'name' => 'Environmental Assessment Methods',
				'description' => '',
			),
			array(
				'name' => 'Environment and Society',
				'description' => '',
			),
			array(
				'name' => 'Environmental Policy',
				'description' => '',
			),
			array(
				'name' => 'Environmental Risk Management',
				'description' => '',
			),
			array(
				'name' => 'Environmental Impact Analysis',
				'description' => '',
			),
			array(
				'name' => 'Land Use Management',
				'description' => '',
			),
			array(
				'name' => 'Water Resource Institutions, Management and Policy',
				'description' => '',
			),
			array(
				'name' => 'Introduction to American Environmental Thought',
				'description' => '',
			),
			array(
				'name' => 'Environmental Modeling',
				'description' => '',
			),
			array(
				'name' => 'Energy Economics',
				'description' => '',
			),
			array(
				'name' => 'Geographic Information Systems for Environmental Management',
				'description' => '',
			),
			array(
				'name' => 'Seminar in Environmental Studies',
				'description' => '',
			),
			array(
				'name' => 'Internship in Environmental Studies',
				'description' => '',
			),
			array(
				'name' => 'Special Topics in Environmental Studies',
				'description' => '',
			),
			array(
				'name' => 'Seminar in Environmental and Public Affairs',
				'description' => '',
			),
			array(
				'name' => 'Senior Thesis Environmental Studies',
				'description' => '',
			),
			array(
				'name' => 'First-Year Seminar',
				'description' => '',
			),
			array(
				'name' => 'Applied Creativity',
				'description' => '',
			),
			array(
				'name' => 'Strategies for Academic Success',
				'description' => '',
			),
			array(
				'name' => 'Educational Psychology',
				'description' => '',
			),
			array(
				'name' => 'Foundations of Educational Assessment',
				'description' => '',
			),
			array(
				'name' => 'Counseling/Consultation Skills for Classroom Teachers',
				'description' => '',
			),
			array(
				'name' => 'Special Topics in School Counseling and Human Development Services',
				'description' => '',
			),
			array(
				'name' => 'Communicating in English I',
				'description' => '',
			),
			array(
				'name' => 'Communicating in English II',
				'description' => '',
			),
			array(
				'name' => 'Communicating in English III',
				'description' => '',
			),
			array(
				'name' => 'Communicating in English IV',
				'description' => '',
			),
			array(
				'name' => 'Communicating in English V',
				'description' => '',
			),
			array(
				'name' => 'Communicating in English VI',
				'description' => '',
			),
			array(
				'name' => 'Computer Assisted ESL I',
				'description' => '',
			),
			array(
				'name' => 'Computer Assisted ESL II',
				'description' => '',
			),
			array(
				'name' => 'Pronunciation and Listening Comprehension - Beginning',
				'description' => '',
			),
			array(
				'name' => 'Basic English Grammar',
				'description' => '',
			),
			array(
				'name' => 'English for Hospitality - ESL',
				'description' => '',
			),
			array(
				'name' => 'Business English ESL',
				'description' => '',
			),
			array(
				'name' => 'Beginning Speaking and Listening',
				'description' => '',
			),
			array(
				'name' => 'Beginning Reading and Writing',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Pronunciation',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Grammar - Part I',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Grammar - Part II',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Reading and Discussion',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Reading and Vocabulary',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Reading and Writing',
				'description' => '',
			),
			array(
				'name' => 'Grammar for Communication',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Conversation: Special Topics',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Speaking and Listening',
				'description' => '',
			),
			array(
				'name' => 'Vocabulary and Idioms of American English-Int/Adv',
				'description' => '',
			),
			array(
				'name' => 'Advanced Grammar',
				'description' => '',
			),
			array(
				'name' => 'Advanced Applied Grammar',
				'description' => '',
			),
			array(
				'name' => 'Advanced Reading and Discussion',
				'description' => '',
			),
			array(
				'name' => 'Advanced Reading and Vocabulary',
				'description' => '',
			),
			array(
				'name' => 'Advanced Reading and Writing',
				'description' => '',
			),
			array(
				'name' => 'Advanced Academic Writing',
				'description' => '',
			),
			array(
				'name' => 'Advanced Speaking and Listening',
				'description' => '',
			),
			array(
				'name' => 'Technical English for ESL',
				'description' => '',
			),
			array(
				'name' => 'American Culture: Reading and Speaking',
				'description' => '',
			),
			array(
				'name' => 'Academic Study Skills for ESL Students',
				'description' => '',
			),
			array(
				'name' => 'Vocabulary Development Intermediate/Advanced',
				'description' => '',
			),
			array(
				'name' => 'Editing Skills for ESL Writers',
				'description' => '',
			),
			array(
				'name' => 'Advanced English Competency',
				'description' => '',
			),
			array(
				'name' => 'Advanced Oral Presentation Skills',
				'description' => '',
			),
			array(
				'name' => 'Education of Students with Gifts and Talents',
				'description' => '',
			),
			array(
				'name' => 'Medical Aspects of Handicapping Conditions',
				'description' => '',
			),
			array(
				'name' => 'Food Service Sanitation I',
				'description' => '',
			),
			array(
				'name' => 'Food Service Operations Fundamentals',
				'description' => '',
			),
			array(
				'name' => 'Hospitality Purchasing',
				'description' => '',
			),
			array(
				'name' => 'Bartending',
				'description' => '',
			),
			array(
				'name' => 'Hotel and Culinary Tour',
				'description' => '',
			),
			array(
				'name' => 'Bar Operations',
				'description' => '',
			),
			array(
				'name' => 'On-Site Services Management',
				'description' => '',
			),
			array(
				'name' => 'Culture and Cuisine',
				'description' => '',
			),
			array(
				'name' => 'Principles of Food Science',
				'description' => '',
			),
			array(
				'name' => 'Distilled Spirits and Liqueurs',
				'description' => '',
			),
			array(
				'name' => 'Inflight Food Service Management',
				'description' => '',
			),
			array(
				'name' => 'New World Wines',
				'description' => '',
			),
			array(
				'name' => 'Old World Wines',
				'description' => '',
			),
			array(
				'name' => 'Special Topics in Food Service Management',
				'description' => '',
			),
			array(
				'name' => 'Beers',
				'description' => '',
			),
			array(
				'name' => 'Concessions Operations Management',
				'description' => '',
			),
			array(
				'name' => 'Nutrition in Food Service',
				'description' => '',
			),
			array(
				'name' => 'UNLVino Management',
				'description' => '',
			),
			array(
				'name' => 'Chef Artist Event Management',
				'description' => '',
			),
			array(
				'name' => 'Food and Beverage Internship I',
				'description' => '',
			),
			array(
				'name' => 'Food and Beverage Internship II',
				'description' => '',
			),
			array(
				'name' => 'Facilities Planning and Equipment',
				'description' => '',
			),
			array(
				'name' => 'Food and Beverage Cost Control',
				'description' => '',
			),
			array(
				'name' => 'Beverage Management',
				'description' => '',
			),
			array(
				'name' => 'Restaurant Management and Operations',
				'description' => '',
			),
			array(
				'name' => 'Global Food and Nutrition Issues',
				'description' => '',
			),
			array(
				'name' => 'Independent Study in Food Service Management',
				'description' => '',
			),
			array(
				'name' => 'Personal Finance',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Investments',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Risk and Insurance',
				'description' => '',
			),
			array(
				'name' => 'Principles of Managerial Finance',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Managerial Finance',
				'description' => '',
			),
			array(
				'name' => 'Investments',
				'description' => '',
			),
			array(
				'name' => 'International Financial Management',
				'description' => '',
			),
			array(
				'name' => 'Capital Markets',
				'description' => '',
			),
			array(
				'name' => 'Corporate Risk Management',
				'description' => '',
			),
			array(
				'name' => 'FIN Insurance and Risk Management',
				'description' => '',
			),
			array(
				'name' => 'Managing New Venture Funding',
				'description' => '',
			),
			array(
				'name' => 'Case Problems in Managerial Finance',
				'description' => '',
			),
			array(
				'name' => 'Financial Derivatives',
				'description' => '',
			),
			array(
				'name' => 'Portfolio Management',
				'description' => '',
			),
			array(
				'name' => 'Property and Liability Insurance',
				'description' => '',
			),
			array(
				'name' => 'Life and Health Insurance',
				'description' => '',
			),
			array(
				'name' => 'Risk Management Seminar',
				'description' => '',
			),
			array(
				'name' => 'Student Managed Investment Fund I',
				'description' => '',
			),
			array(
				'name' => 'Student Managed Investment Fund II',
				'description' => '',
			),
			array(
				'name' => 'Student Managed Investment Fund III',
				'description' => '',
			),
			array(
				'name' => 'Commercial Banking',
				'description' => '',
			),
			array(
				'name' => 'Entrepreneurial Finance',
				'description' => '',
			),
			array(
				'name' => 'Finance Internship',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Film',
				'description' => '',
			),
			array(
				'name' => 'Language of Film',
				'description' => '',
			),
			array(
				'name' => 'Film Analysis',
				'description' => '',
			),
			array(
				'name' => 'Intro to Screenwriting',
				'description' => '',
			),
			array(
				'name' => 'Film Production I',
				'description' => '',
			),
			array(
				'name' => 'Film Criticism',
				'description' => '',
			),
			array(
				'name' => 'Script Supervising and Continuity Style',
				'description' => '',
			),
			array(
				'name' => 'Film Editing',
				'description' => '',
			),
			array(
				'name' => 'Film Sound',
				'description' => '',
			),
			array(
				'name' => 'Film Production II',
				'description' => '',
			),
			array(
				'name' => 'Staging for the Screen',
				'description' => '',
			),
			array(
				'name' => 'Cinematography',
				'description' => '',
			),
			array(
				'name' => 'Film Production Design',
				'description' => '',
			),
			array(
				'name' => 'Basic Grip and Electrical',
				'description' => '',
			),
			array(
				'name' => 'Pre-Production Approaches for Film and Video',
				'description' => '',
			),
			array(
				'name' => 'Working in Film and TV Industry',
				'description' => '',
			),
			array(
				'name' => 'Professional Film Production Methods',
				'description' => '',
			),
			array(
				'name' => 'Advanced Directing Workshop',
				'description' => '',
			),
			array(
				'name' => 'Acting for the Film Director',
				'description' => '',
			),
			array(
				'name' => 'Historical Survey of Screen Acting',
				'description' => '',
			),
			array(
				'name' => 'Scene Work for Directors',
				'description' => '',
			),
			array(
				'name' => 'Film Theory',
				'description' => '',
			),
			array(
				'name' => 'Politics and the Film',
				'description' => '',
			),
			array(
				'name' => 'Major Figures in the Cinema',
				'description' => '',
			),
			array(
				'name' => 'Cinematic Structure',
				'description' => '',
			),
			array(
				'name' => 'Story Development',
				'description' => '',
			),
			array(
				'name' => 'Screenwriting I',
				'description' => '',
			),
			array(
				'name' => 'Screenwriting II',
				'description' => '',
			),
			array(
				'name' => 'Writing for Television I',
				'description' => '',
			),
			array(
				'name' => 'Writing for Television II',
				'description' => '',
			),
			array(
				'name' => 'Film Production III',
				'description' => '',
			),
			array(
				'name' => 'Short Film Archiving',
				'description' => '',
			),
			array(
				'name' => 'Music Video',
				'description' => '',
			),
			array(
				'name' => 'Industry vs. Artistry in Film and Television',
				'description' => '',
			),
			array(
				'name' => 'Producing For Hire',
				'description' => '',
			),
			array(
				'name' => 'The European Film',
				'description' => '',
			),
			array(
				'name' => 'Drama and Film of German Expressionism',
				'description' => '',
			),
			array(
				'name' => 'From French Literature to Film',
				'description' => '',
			),
			array(
				'name' => 'Documentary Film and Video',
				'description' => '',
			),
			array(
				'name' => 'The Rise of Irish Cinema',
				'description' => '',
			),
			array(
				'name' => 'History of the Russian Film',
				'description' => '',
			),
			array(
				'name' => 'Documentary Techniques',
				'description' => '',
			),
			array(
				'name' => 'Master Directing',
				'description' => '',
			),
			array(
				'name' => 'The History of French Film',
				'description' => '',
			),
			array(
				'name' => 'Directed Studies in Film',
				'description' => '',
			),
			array(
				'name' => 'Co-Curricular Film Project',
				'description' => '',
			),
			array(
				'name' => 'Women in Film',
				'description' => '',
			),
			array(
				'name' => 'Advanced Post Production Techniques',
				'description' => '',
			),
			array(
				'name' => '3D Visual Effects for Film',
				'description' => '',
			),
			array(
				'name' => 'Sex in the Cinema',
				'description' => '',
			),
			array(
				'name' => 'Modern Latin American Film',
				'description' => '',
			),
			array(
				'name' => 'Adaptation Stage to Screen',
				'description' => '',
			),
			array(
				'name' => 'Screen Acting for a Living',
				'description' => '',
			),
			array(
				'name' => 'American Hero in Film and Literature',
				'description' => '',
			),
			array(
				'name' => 'Reading Proficiency in a Foreign Language for Graduate Students',
				'description' => '',
			),
			array(
				'name' => 'Current Linguistic Theory',
				'description' => '',
			),
			array(
				'name' => 'Romance Linguistics',
				'description' => '',
			),
			array(
				'name' => 'Comparative Linguistics: Languages of the World',
				'description' => '',
			),
			array(
				'name' => 'Application of Linguistics to the Teaching of Languages',
				'description' => '',
			),
			array(
				'name' => 'Elementary French I',
				'description' => '',
			),
			array(
				'name' => 'Elementary French II',
				'description' => '',
			),
			array(
				'name' => 'Study Abroad in Foreign Language, Literature or Culture I',
				'description' => '',
			),
			array(
				'name' => 'Intermediate French I',
				'description' => '',
			),
			array(
				'name' => 'Intermediate French II',
				'description' => '',
			),
			array(
				'name' => 'French Grammar Review',
				'description' => '',
			),
			array(
				'name' => 'Third-Year French: Composition and Conversation I',
				'description' => '',
			),
			array(
				'name' => 'Third-Year French: Composition and Conversation II',
				'description' => '',
			),
			array(
				'name' => 'French Phonetics',
				'description' => '',
			),
			array(
				'name' => 'Survey of French Culture',
				'description' => '',
			),
			array(
				'name' => 'History of French Literature I',
				'description' => '',
			),
			array(
				'name' => 'History of French Literature II',
				'description' => '',
			),
			array(
				'name' => 'Advanced French Composition and Conversation I',
				'description' => '',
			),
			array(
				'name' => 'Advanced French Composition and Conversation II',
				'description' => '',
			),
			array(
				'name' => 'Business French',
				'description' => '',
			),
			array(
				'name' => 'Topics in French Culture',
				'description' => '',
			),
			array(
				'name' => 'Topics in French Literature',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Gaming Management',
				'description' => '',
			),
			array(
				'name' => 'Gaming Management I',
				'description' => '',
			),
			array(
				'name' => 'Protection of Casino Table Games',
				'description' => '',
			),
			array(
				'name' => 'Gaming Device Management',
				'description' => '',
			),
			array(
				'name' => 'Problem Gambling',
				'description' => '',
			),
			array(
				'name' => 'Accounting for the Gaming Industry',
				'description' => '',
			),
			array(
				'name' => 'Gaming Management II',
				'description' => '',
			),
			array(
				'name' => 'Casino Industry Regulation',
				'description' => '',
			),
			array(
				'name' => 'Seminar in Casino Management',
				'description' => '',
			),
			array(
				'name' => 'Casino Marketing',
				'description' => '',
			),
			array(
				'name' => 'Sociology of Gambling',
				'description' => '',
			),
			array(
				'name' => 'Quantitative Methods and Applications in Casino Gaming',
				'description' => '',
			),
			array(
				'name' => 'Independent Study in Gaming Management',
				'description' => '',
			),
			array(
				'name' => 'Internship in Gaming Operations',
				'description' => '',
			),
			array(
				'name' => 'Special Topics in Gaming Operations',
				'description' => '',
			),
			array(
				'name' => 'Physical Geography of Earth\'s Environment',
				'description' => '',
			),
			array(
				'name' => 'Physical Geography Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Oceanography',
				'description' => '',
			),
			array(
				'name' => 'Conversations With Earth',
				'description' => '',
			),
			array(
				'name' => 'Climatology',
				'description' => '',
			),
			array(
				'name' => 'Natural Disasters',
				'description' => '',
			),
			array(
				'name' => 'Exploring Planet Earth',
				'description' => '',
			),
			array(
				'name' => 'Earth and Life Through Time',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Geology of National Parks',
				'description' => '',
			),
			array(
				'name' => 'Global Warming',
				'description' => '',
			),
			array(
				'name' => 'Science in American Culture',
				'description' => '',
			),
			array(
				'name' => 'Water and the West',
				'description' => '',
			),
			array(
				'name' => 'Earth Resources and Society',
				'description' => '',
			),
			array(
				'name' => 'Conversations with Earth',
				'description' => '',
			),
			array(
				'name' => 'The Moon and Mars: Introduction to Planetary Geology',
				'description' => '',
			),
			array(
				'name' => 'Mineralogy',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Optical Mineralogy and Petrography',
				'description' => '',
			),
			array(
				'name' => 'Paleontology Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Global Environmental Change',
				'description' => '',
			),
			array(
				'name' => 'Principles of Geomorphology',
				'description' => '',
			),
			array(
				'name' => 'Principles of Geomorphology Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Environmental Geology',
				'description' => '',
			),
			array(
				'name' => 'Earth Resources and the Environment',
				'description' => '',
			),
			array(
				'name' => 'Structural Geology',
				'description' => '',
			),
			array(
				'name' => 'Field Geology I',
				'description' => '',
			),
			array(
				'name' => 'Field Trip',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Field Geology',
				'description' => '',
			),
			array(
				'name' => 'Advanced Field Geology',
				'description' => '',
			),
			array(
				'name' => 'Soil Classification and Resource Management',
				'description' => '',
			),
			array(
				'name' => 'Introduction to X-ray Diffraction and X-ray Spectrometry Methods',
				'description' => '',
			),
			array(
				'name' => 'Principles of Geochemistry',
				'description' => '',
			),
			array(
				'name' => 'Igneous and Metamorphic Petrology/Petrography',
				'description' => '',
			),
			array(
				'name' => 'Geochemical Thermodynamics and Kinetics',
				'description' => '',
			),
			array(
				'name' => 'Geographic Information Systems (GIS): Theory and Applications',
				'description' => '',
			),
			array(
				'name' => 'Glacial and Periglacial Geology',
				'description' => '',
			),
			array(
				'name' => 'Quaternary Geology',
				'description' => '',
			),
			array(
				'name' => 'Quaternary Paleoecology',
				'description' => '',
			),
			array(
				'name' => 'Paleoclimatology',
				'description' => '',
			),
			array(
				'name' => 'Volcanology',
				'description' => '',
			),
			array(
				'name' => 'Plate Tectonics',
				'description' => '',
			),
			array(
				'name' => 'Tectonics of Orogenic Belts',
				'description' => '',
			),
			array(
				'name' => 'Geophysical Methods',
				'description' => '',
			),
			array(
				'name' => 'Geologic Application in Remote Sensing',
				'description' => '',
			),
			array(
				'name' => 'Geochronology',
				'description' => '',
			),
			array(
				'name' => 'Principles of Stratigraphy and Sedimentation',
				'description' => '',
			),
			array(
				'name' => 'Petroleum Geology',
				'description' => '',
			),
			array(
				'name' => 'Hydrogeology',
				'description' => '',
			),
			array(
				'name' => 'Geology of Metallic Ore Deposits',
				'description' => '',
			),
			array(
				'name' => 'Hydrogeochemistry',
				'description' => '',
			),
			array(
				'name' => 'Engineering Geology',
				'description' => '',
			),
			array(
				'name' => 'Microtechniques in Geoscience',
				'description' => '',
			),
			array(
				'name' => 'Seminar',
				'description' => '',
			),
			array(
				'name' => 'Independent Study and Research',
				'description' => '',
			),
			array(
				'name' => 'Advanced Topics in Geoscience',
				'description' => '',
			),
			array(
				'name' => 'Senior Thesis',
				'description' => '',
			),
			array(
				'name' => 'Elementary German I',
				'description' => '',
			),
			array(
				'name' => 'Elementary German II',
				'description' => '',
			),
			array(
				'name' => 'Elementary German Conversation',
				'description' => '',
			),
			array(
				'name' => 'Intermediate German I',
				'description' => '',
			),
			array(
				'name' => 'Intermediate German II',
				'description' => '',
			),
			array(
				'name' => 'German Grammar Review',
				'description' => '',
			),
			array(
				'name' => 'Introductory German Texts in the Humanities',
				'description' => '',
			),
			array(
				'name' => 'Third-Year German: Composition and Conversation I',
				'description' => '',
			),
			array(
				'name' => 'Third-Year German: Composition and Conversation II',
				'description' => '',
			),
			array(
				'name' => 'Introduction to German Linguistics',
				'description' => '',
			),
			array(
				'name' => 'German Phonetics',
				'description' => '',
			),
			array(
				'name' => 'German Culture and Civilization',
				'description' => '',
			),
			array(
				'name' => 'Contemporary Germany and Austria',
				'description' => '',
			),
			array(
				'name' => 'German Literature in Translation - Drama',
				'description' => '',
			),
			array(
				'name' => 'German Literature in Translation - Prose',
				'description' => '',
			),
			array(
				'name' => 'German Literature to',
				'description' => '',
			),
			array(
				'name' => 'German Literature from  to the Present',
				'description' => '',
			),
			array(
				'name' => 'Advanced German Texts in the Humanities',
				'description' => '',
			),
			array(
				'name' => 'Advanced German Composition and Conversation I',
				'description' => '',
			),
			array(
				'name' => 'Advanced German Composition and Conversation II',
				'description' => '',
			),
			array(
				'name' => 'German Translation and Interpretation',
				'description' => '',
			),
			array(
				'name' => 'GER German Translation Project',
				'description' => '',
			),
			array(
				'name' => 'Business German',
				'description' => '',
			),
			array(
				'name' => 'German Drama Production',
				'description' => '',
			),
			array(
				'name' => 'Topics in German Culture',
				'description' => '',
			),
			array(
				'name' => 'Modern German Culture Through Film',
				'description' => '',
			),
			array(
				'name' => 'German Literature of the Baroque',
				'description' => '',
			),
			array(
				'name' => 'German Literature of the Enlightenment',
				'description' => '',
			),
			array(
				'name' => 'Storm and Stress and Classicism',
				'description' => '',
			),
			array(
				'name' => 'Romanticism',
				'description' => '',
			),
			array(
				'name' => 'Nineteenth-Century Drama and Poetry',
				'description' => '',
			),
			array(
				'name' => 'Nineteenth-Century Prose',
				'description' => '',
			),
			array(
				'name' => 'Modern German Literature I',
				'description' => '',
			),
			array(
				'name' => 'Modern German Literature II',
				'description' => '',
			),
			array(
				'name' => 'Contemporary German Literature',
				'description' => '',
			),
			array(
				'name' => 'Selected Topics of German Literature',
				'description' => '',
			),
			array(
				'name' => 'Intensive Advanced German Texts in the Humanities',
				'description' => '',
			),
			array(
				'name' => 'Classical Greek I',
				'description' => '',
			),
			array(
				'name' => 'Classical Greek II',
				'description' => '',
			),
			array(
				'name' => 'Modern Greek I',
				'description' => '',
			),
			array(
				'name' => 'Classical Greek III',
				'description' => '',
			),
			array(
				'name' => 'Greek Literature in Translation',
				'description' => '',
			),
			array(
				'name' => 'First Year Experience Seminar',
				'description' => '',
			),
			array(
				'name' => 'Brookings: Introduction to Public Policy',
				'description' => '',
			),
			array(
				'name' => 'Brookings: Analyzing National Governance Issues',
				'description' => '',
			),
			array(
				'name' => 'Brookings: National Economic Studies',
				'description' => '',
			),
			array(
				'name' => 'Brookings: U.S. Foreign Policy',
				'description' => '',
			),
			array(
				'name' => 'Brookings: Global Development',
				'description' => '',
			),
			array(
				'name' => 'Brookings: Metropolitan Policy',
				'description' => '',
			),
			array(
				'name' => 'Senior Seminar in Great Works',
				'description' => '',
			),
			array(
				'name' => 'U.S. Health Care System',
				'description' => '',
			),
			array(
				'name' => 'Health Care Law',
				'description' => '',
			),
			array(
				'name' => 'Epidemiological Concepts for Health Care Administration',
				'description' => '',
			),
			array(
				'name' => 'Multicultural Diversity and the US Health Care System',
				'description' => '',
			),
			array(
				'name' => 'Management of Health Services Organizations',
				'description' => '',
			),
			array(
				'name' => 'Health Care Finance',
				'description' => '',
			),
			array(
				'name' => 'Management of Health Information Systems',
				'description' => '',
			),
			array(
				'name' => 'Strategic Planning and Marketing for Health Care Organizations',
				'description' => '',
			),
			array(
				'name' => 'Pre-Practicum in Health Care Administration',
				'description' => '',
			),
			array(
				'name' => 'Health Care Administration Practicum',
				'description' => '',
			),
			array(
				'name' => 'Quantitative Management for Health Care Organizations',
				'description' => '',
			),
			array(
				'name' => 'Managed Care',
				'description' => '',
			),
			array(
				'name' => 'Human Resources Management for Health Care Organizations',
				'description' => '',
			),
			array(
				'name' => 'Health Politics and Policy',
				'description' => '',
			),
			array(
				'name' => 'Organization and Management of Long-Term Care Services',
				'description' => '',
			),
			array(
				'name' => 'Independent Study in Health Care Administration',
				'description' => '',
			),
			array(
				'name' => 'Special Topics in Health Care Administration',
				'description' => '',
			),
			array(
				'name' => 'Elementary Hebrew I and II',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Hebrew I and II',
				'description' => '',
			),
			array(
				'name' => 'Historical Issues and Contemporary Society',
				'description' => '',
			),
			array(
				'name' => 'United States: Colonial Period to 77',
				'description' => '',
			),
			array(
				'name' => 'United States Since 77',
				'description' => '',
			),
			array(
				'name' => 'Global Problems in Historical Perspective',
				'description' => '',
			),
			array(
				'name' => 'European Civilization to',
				'description' => '',
			),
			array(
				'name' => 'European Civilization Since',
				'description' => '',
			),
			array(
				'name' => 'History of Multicultural America',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Chinese Civilization',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Japanese Civilization',
				'description' => '',
			),
			array(
				'name' => 'World History I',
				'description' => '',
			),
			array(
				'name' => 'World History II',
				'description' => '',
			),
			array(
				'name' => 'Nevada History',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Latin American History and Culture I',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Latin American History and Culture II',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Historical Methods',
				'description' => '',
			),
			array(
				'name' => 'History and New Media',
				'description' => '',
			),
			array(
				'name' => 'The News in Historical Perspective',
				'description' => '',
			),
			array(
				'name' => 'American Law and Disorder',
				'description' => '',
			),
			array(
				'name' => 'U.S. Involvement in Vietnam',
				'description' => '',
			),
			array(
				'name' => 'Terrorism in the Russian Empire',
				'description' => '',
			),
			array(
				'name' => 'The End of Communism',
				'description' => '',
			),
			array(
				'name' => 'Comparative Slavery',
				'description' => '',
			),
			array(
				'name' => 'World War I: Origins, Experience, Memory',
				'description' => '',
			),
			array(
				'name' => 'From Asia to America',
				'description' => '',
			),
			array(
				'name' => 'History of Modern Africa',
				'description' => '',
			),
			array(
				'name' => 'Passions of the French: France Since',
				'description' => '',
			),
			array(
				'name' => 'The Holocaust in Its European Setting',
				'description' => '',
			),
			array(
				'name' => 'Culture and Technology in America',
				'description' => '',
			),
			array(
				'name' => 'Topics in Sports History',
				'description' => '',
			),
			array(
				'name' => 'Military History of the United States to 00',
				'description' => '',
			),
			array(
				'name' => 'Military History of the United States Since 00',
				'description' => '',
			),
			array(
				'name' => 'Great Personalities in History',
				'description' => '',
			),
			array(
				'name' => 'American Constitutional and Legal History',
				'description' => '',
			),
			array(
				'name' => 'American Social History to 60',
				'description' => '',
			),
			array(
				'name' => 'American Social History, 65-Present',
				'description' => '',
			),
			array(
				'name' => 'History of the New South',
				'description' => '',
			),
			array(
				'name' => 'The American West to',
				'description' => '',
			),
			array(
				'name' => 'The American West Since',
				'description' => '',
			),
			array(
				'name' => 'United States Foreign Relations I',
				'description' => '',
			),
			array(
				'name' => 'United States Foreign Relations II',
				'description' => '',
			),
			array(
				'name' => 'American Cultural and Intellectual History I',
				'description' => '',
			),
			array(
				'name' => 'American Cultural and Intellectual History II',
				'description' => '',
			),
			array(
				'name' => 'United States: Colonial Period',
				'description' => '',
			),
			array(
				'name' => 'United States: Revolution and the New Republic',
				'description' => '',
			),
			array(
				'name' => 'United States: National Period',
				'description' => '',
			),
			array(
				'name' => 'United States: Civil War and Reconstruction, 60-77',
				'description' => '',
			),
			array(
				'name' => 'HIST United States: The Gilded Age, 77-00',
				'description' => '',
			),
			array(
				'name' => 'United States: The Progressive Period, 00-',
				'description' => '',
			),
			array(
				'name' => 'Recent America: Era of Franklin D. Roosevelt, -',
				'description' => '',
			),
			array(
				'name' => 'Contemporary America: The U.S. Since',
				'description' => '',
			),
			array(
				'name' => 'Nevada and the Far West',
				'description' => '',
			),
			array(
				'name' => 'Britain to 50',
				'description' => '',
			),
			array(
				'name' => 'Britain from 50',
				'description' => '',
			),
			array(
				'name' => 'Revolution in Central Europe: Present',
				'description' => '',
			),
			array(
				'name' => 'History of Russia to',
				'description' => '',
			),
			array(
				'name' => 'History of Russia Since',
				'description' => '',
			),
			array(
				'name' => 'History of Germany to',
				'description' => '',
			),
			array(
				'name' => 'History of Germany Since',
				'description' => '',
			),
			array(
				'name' => 'Role of Religion in American Culture',
				'description' => '',
			),
			array(
				'name' => 'History of Southern Nevada',
				'description' => '',
			),
			array(
				'name' => 'The American West Through Film',
				'description' => '',
			),
			array(
				'name' => 'Role of Business in United States History',
				'description' => '',
			),
			array(
				'name' => 'History of American Labor, 07-Present',
				'description' => '',
			),
			array(
				'name' => 'History of American Women to 70',
				'description' => '',
			),
			array(
				'name' => 'History of American Women, 70 to the Present',
				'description' => '',
			),
			array(
				'name' => 'African-American History',
				'description' => '',
			),
			array(
				'name' => 'African-American History to 77',
				'description' => '',
			),
			array(
				'name' => 'African-American History since 77',
				'description' => '',
			),
			array(
				'name' => 'Role of Cities in American History',
				'description' => '',
			),
			array(
				'name' => 'European Urban History',
				'description' => '',
			),
			array(
				'name' => 'Early Modern Intellectual History',
				'description' => '',
			),
			array(
				'name' => 'Modern Intellectual History',
				'description' => '',
			),
			array(
				'name' => 'Topics in European Cultural and Intellectual History',
				'description' => '',
			),
			array(
				'name' => 'Nazi Holocaust from the American Perspective',
				'description' => '',
			),
			array(
				'name' => 'Family History',
				'description' => '',
			),
			array(
				'name' => 'American Indian History to 51',
				'description' => '',
			),
			array(
				'name' => 'American Indian History Since 51',
				'description' => '',
			),
			array(
				'name' => 'Topics in American Indian History',
				'description' => '',
			),
			array(
				'name' => 'Regions in American Indian History',
				'description' => '',
			),
			array(
				'name' => 'American Environmental History',
				'description' => '',
			),
			array(
				'name' => 'Comparative Environmental History',
				'description' => '',
			),
			array(
				'name' => 'Historic Preservation',
				'description' => '',
			),
			array(
				'name' => 'Latinos in the American West',
				'description' => '',
			),
			array(
				'name' => 'Cultural History of Modern Russia',
				'description' => '',
			),
			array(
				'name' => 'Revolutionary Russia',
				'description' => '',
			),
			array(
				'name' => 'Asian American History',
				'description' => '',
			),
			array(
				'name' => 'History of Japan to 00',
				'description' => '',
			),
			array(
				'name' => 'History of Japan Since 00',
				'description' => '',
			),
			array(
				'name' => 'Topics in Japanese History',
				'description' => '',
			),
			array(
				'name' => 'Capstone Research Seminar',
				'description' => '',
			),
			array(
				'name' => 'Popular Culture in Nineteenth-Century America',
				'description' => '',
			),
			array(
				'name' => 'Popular Culture in Twentieth-Century America',
				'description' => '',
			),
			array(
				'name' => 'Women in Politics',
				'description' => '',
			),
			array(
				'name' => 'History of China to 00',
				'description' => '',
			),
			array(
				'name' => 'History of China Since 00',
				'description' => '',
			),
			array(
				'name' => 'Topics in Modern China',
				'description' => '',
			),
			array(
				'name' => 'Topics in Ancient History',
				'description' => '',
			),
			array(
				'name' => 'Ancient Greek Civilization',
				'description' => '',
			),
			array(
				'name' => 'Roman Civilization',
				'description' => '',
			),
			array(
				'name' => 'The Middle Ages',
				'description' => '',
			),
			array(
				'name' => 'Topics in Medieval History',
				'description' => '',
			),
			array(
				'name' => 'The Reformation',
				'description' => '',
			),
			array(
				'name' => 'Europe in the Eighteenth Century',
				'description' => '',
			),
			array(
				'name' => 'Early Modern Europe: 50-89',
				'description' => '',
			),
			array(
				'name' => 'The French Revolution and Napoleon',
				'description' => '',
			),
			array(
				'name' => 'Europe: Present',
				'description' => '',
			),
			array(
				'name' => 'European Diplomatic History, Present',
				'description' => '',
			),
			array(
				'name' => 'History of Science',
				'description' => '',
			),
			array(
				'name' => 'History of Mexico',
				'description' => '',
			),
			array(
				'name' => 'Revolution and Reaction in Contemporary Latin America',
				'description' => '',
			),
			array(
				'name' => 'History of Brazil',
				'description' => '',
			),
			array(
				'name' => 'History of the Andean Region',
				'description' => '',
			),
			array(
				'name' => 'Latin American Ethnic Studies',
				'description' => '',
			),
			array(
				'name' => 'The Mexican Revolution',
				'description' => '',
			),
			array(
				'name' => 'Islamic and Middle Eastern History to 50',
				'description' => '',
			),
			array(
				'name' => 'Islamic and Middle Eastern History Since 50',
				'description' => '',
			),
			array(
				'name' => 'History of the British Empire',
				'description' => '',
			),
			array(
				'name' => 'West Africa and the Making of the Atlantic World',
				'description' => '',
			),
			array(
				'name' => 'Urban Destruction and Reconstruction',
				'description' => '',
			),
			array(
				'name' => 'Oral History',
				'description' => '',
			),
			array(
				'name' => 'Study in History Abroad',
				'description' => '',
			),
			array(
				'name' => 'Topics in American Studies',
				'description' => '',
			),
			array(
				'name' => 'Comparative History',
				'description' => '',
			),
			array(
				'name' => 'Women in the Ancient World',
				'description' => '',
			),
			array(
				'name' => 'Women in Medieval Culture and Society',
				'description' => '',
			),
			array(
				'name' => 'Women in Early Modern Europe',
				'description' => '',
			),
			array(
				'name' => 'Women in Modern European History',
				'description' => '',
			),
			array(
				'name' => 'Topics in Gender and History',
				'description' => '',
			),
			array(
				'name' => 'Philosophy of History',
				'description' => '',
			),
			array(
				'name' => 'Advanced Historical Studies',
				'description' => '',
			),
			array(
				'name' => 'Introduction to the Hospitality Industry',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Hotel Management',
				'description' => '',
			),
			array(
				'name' => 'Introduction to the Lodging Industry',
				'description' => '',
			),
			array(
				'name' => 'Housekeeping Operations',
				'description' => '',
			),
			array(
				'name' => 'Front-Office Operations',
				'description' => '',
			),
			array(
				'name' => 'Basic Computer Applications for Hospitality Managers',
				'description' => '',
			),
			array(
				'name' => 'Industry Computer Applications for Hospitality & Tourism',
				'description' => '',
			),
			array(
				'name' => 'Introduction to the Timeshare and Vacation Ownership Industry',
				'description' => '',
			),
			array(
				'name' => 'Hospitality Externship',
				'description' => '',
			),
			array(
				'name' => 'Hospitality Services Management',
				'description' => '',
			),
			array(
				'name' => 'Human Resources Management in the Hospitality Industry',
				'description' => '',
			),
			array(
				'name' => 'HMD Franchising',
				'description' => '',
			),
			array(
				'name' => 'Hospitality Leadership, Management, & Ethics',
				'description' => '',
			),
			array(
				'name' => 'Ethics for the Hospitality Industry',
				'description' => '',
			),
			array(
				'name' => 'Working with Diversity',
				'description' => '',
			),
			array(
				'name' => 'Timeshare and Vacation Ownership Resorts',
				'description' => '',
			),
			array(
				'name' => 'Executive Speakers Series',
				'description' => '',
			),
			array(
				'name' => 'Special Topics in Hotel Administration',
				'description' => '',
			),
			array(
				'name' => 'Facilities Management',
				'description' => '',
			),
			array(
				'name' => 'Architecture in Hotel Management',
				'description' => '',
			),
			array(
				'name' => 'Hospitality Law',
				'description' => '',
			),
			array(
				'name' => 'Employment Law in the Hospitality Industry',
				'description' => '',
			),
			array(
				'name' => 'Organizational Behavior Applied to the Service Industries',
				'description' => '',
			),
			array(
				'name' => 'Labor-Management Relations',
				'description' => '',
			),
			array(
				'name' => 'Hospitality Security and the Preservation of Assets',
				'description' => '',
			),
			array(
				'name' => 'Strategic Planning in Timeshare and Vacation Ownership Industry',
				'description' => '',
			),
			array(
				'name' => 'Hospitality Internship',
				'description' => '',
			),
			array(
				'name' => 'Strategic Management in Hospitality',
				'description' => '',
			),
			array(
				'name' => 'Hotel Administration Seminar',
				'description' => '',
			),
			array(
				'name' => 'Employee Development',
				'description' => '',
			),
			array(
				'name' => 'Independent Study in Hotel Management',
				'description' => '',
			),
			array(
				'name' => 'Honors Rhetoric',
				'description' => '',
			),
			array(
				'name' => 'Honors Critical Thinking',
				'description' => '',
			),
			array(
				'name' => 'SAGE Academy Seminar',
				'description' => '',
			),
			array(
				'name' => 'Honors Orientation Seminar',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Literary Analysis',
				'description' => '',
			),
			array(
				'name' => 'Perspectives on the Western Experience I',
				'description' => '',
			),
			array(
				'name' => 'Themes in American Civilization',
				'description' => '',
			),
			array(
				'name' => 'Exploring American Politics',
				'description' => '',
			),
			array(
				'name' => 'Perspectives on the Western Experience II',
				'description' => '',
			),
			array(
				'name' => 'Adventures in Data Analysis',
				'description' => '',
			),
			array(
				'name' => 'Honors Mathematics I',
				'description' => '',
			),
			array(
				'name' => 'Honors Mathematics II',
				'description' => '',
			),
			array(
				'name' => 'Honors Calculus I',
				'description' => '',
			),
			array(
				'name' => 'Honors Calculus II',
				'description' => '',
			),
			array(
				'name' => 'Honors Introduction to Philosophy',
				'description' => '',
			),
			array(
				'name' => 'Honors Public Speaking',
				'description' => '',
			),
			array(
				'name' => 'Topics in Social Science',
				'description' => '',
			),
			array(
				'name' => 'Honors General Psychology',
				'description' => '',
			),
			array(
				'name' => 'Honors Microeconomics',
				'description' => '',
			),
			array(
				'name' => 'Honors Macroeconomics',
				'description' => '',
			),
			array(
				'name' => 'Individual, Society, and Freedom',
				'description' => '',
			),
			array(
				'name' => 'Honors Introduction to Cultural Anthropology',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Performance',
				'description' => '',
			),
			array(
				'name' => 'Scientific World View I',
				'description' => '',
			),
			array(
				'name' => 'Scientific World View II',
				'description' => '',
			),
			array(
				'name' => 'The Development of Science',
				'description' => '',
			),
			array(
				'name' => 'Honors Calculus III',
				'description' => '',
			),
			array(
				'name' => 'Honors Book Forum',
				'description' => '',
			),
			array(
				'name' => 'Lessons in Leadership',
				'description' => '',
			),
			array(
				'name' => 'Honors Internship',
				'description' => '',
			),
			array(
				'name' => 'Special Topics Seminars',
				'description' => '',
			),
			array(
				'name' => 'Self-Directed Study',
				'description' => '',
			),
			array(
				'name' => 'Honors Thesis/Project I',
				'description' => '',
			),
			array(
				'name' => 'Honors Thesis/Project II',
				'description' => '',
			),
			array(
				'name' => 'Radiation Science',
				'description' => '',
			),
			array(
				'name' => 'Fundamentals of Radiation Protection Technology',
				'description' => '',
			),
			array(
				'name' => 'Physics of Ionizing Radiation',
				'description' => '',
			),
			array(
				'name' => 'Principles of Health Physics',
				'description' => '',
			),
			array(
				'name' => 'Radiation Detection',
				'description' => '',
			),
			array(
				'name' => 'Radiation Physics and Instrumentation Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Health Physics Seminar',
				'description' => '',
			),
			array(
				'name' => 'Advanced Health Physics',
				'description' => '',
			),
			array(
				'name' => 'Radiation Biology',
				'description' => '',
			),
			array(
				'name' => 'Environmental Health Physics',
				'description' => '',
			),
			array(
				'name' => 'Medical Health Physics',
				'description' => '',
			),
			array(
				'name' => 'Health Physics Internship',
				'description' => '',
			),
			array(
				'name' => 'Health Physics Research',
				'description' => '',
			),
			array(
				'name' => 'Directed Study',
				'description' => '',
			),
			array(
				'name' => 'Inquiry and Issues in Health Sciences',
				'description' => '',
			),
			array(
				'name' => 'Patient Education in the Health Sciences',
				'description' => '',
			),
			array(
				'name' => 'Patient-Provider Relationships in the Health Sciences',
				'description' => '',
			),
			array(
				'name' => 'Research Methodologies in the Health Sciences',
				'description' => '',
			),
			array(
				'name' => 'Ethical Issues in Health Care',
				'description' => '',
			),
			array(
				'name' => 'Management Principles in the Health Sciences',
				'description' => '',
			),
			array(
				'name' => 'Information Technology for the Health Sciences',
				'description' => '',
			),
			array(
				'name' => 'Professional Paper in the Health Sciences',
				'description' => '',
			),
			array(
				'name' => 'Holistic Health Care: The Art and Science of Caring and Healing',
				'description' => '',
			),
			array(
				'name' => 'Special Topics in Health Sciences',
				'description' => '',
			),
			array(
				'name' => 'International Business',
				'description' => '',
			),
			array(
				'name' => 'International Business Internship',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Interdisciplinary Studies',
				'description' => '',
			),
			array(
				'name' => 'Interdisciplinary Research Methods',
				'description' => '',
			),
			array(
				'name' => 'Rebel Internship Program: General Internship',
				'description' => '',
			),
			array(
				'name' => 'Interdisciplinary Inquiry',
				'description' => '',
			),
			array(
				'name' => 'Interdisciplinary Studies Capstone',
				'description' => '',
			),
			array(
				'name' => 'Independent Study: Capstone II',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Informatics I - Basic Concepts',
				'description' => '',
			),
			array(
				'name' => 'Intro to Informatics II - Information Infrastructures',
				'description' => '',
			),
			array(
				'name' => 'Social Informatics',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Healthcare Informatics',
				'description' => '',
			),
			array(
				'name' => 'Organizational Informatics',
				'description' => '',
			),
			array(
				'name' => 'Information Representation',
				'description' => '',
			),
			array(
				'name' => 'Digital Media',
				'description' => '',
			),
			array(
				'name' => 'Information and Computer Systems Security',
				'description' => '',
			),
			array(
				'name' => 'Informatics Project Management',
				'description' => '',
			),
			array(
				'name' => 'Business Analysis for Informatics',
				'description' => '',
			),
			array(
				'name' => 'INF Web Design Concepts',
				'description' => '',
			),
			array(
				'name' => 'Internet Concepts',
				'description' => '',
			),
			array(
				'name' => 'Computer and Internet Forensics',
				'description' => '',
			),
			array(
				'name' => 'CyberWarfare',
				'description' => '',
			),
			array(
				'name' => 'Advanced Topics in Informatics',
				'description' => '',
			),
			array(
				'name' => 'Advanced HCI - Theory and Concepts',
				'description' => '',
			),
			array(
				'name' => 'Advanced HCI - Design and Implementation',
				'description' => '',
			),
			array(
				'name' => 'Digital Forensics',
				'description' => '',
			),
			array(
				'name' => 'Computer Forensics',
				'description' => '',
			),
			array(
				'name' => 'Network Forensics',
				'description' => '',
			),
			array(
				'name' => 'Independent Study in Informatics',
				'description' => '',
			),
			array(
				'name' => 'Informatics Professional Internship',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Information Systems',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Programming Methodology',
				'description' => '',
			),
			array(
				'name' => 'Systems Analysis Theory',
				'description' => '',
			),
			array(
				'name' => 'Enterprise Information Systems Architecture and IBM System',
				'description' => '',
			),
			array(
				'name' => 'Project Management I',
				'description' => '',
			),
			array(
				'name' => 'Object-Oriented Programming',
				'description' => '',
			),
			array(
				'name' => 'Business Intelligence',
				'description' => '',
			),
			array(
				'name' => 'Web Application Development',
				'description' => '',
			),
			array(
				'name' => 'Advanced Business Systems Development',
				'description' => '',
			),
			array(
				'name' => 'Study and Proposal of New Business Systems',
				'description' => '',
			),
			array(
				'name' => 'Database Design and Implementation',
				'description' => '',
			),
			array(
				'name' => 'Oracle Database Administration',
				'description' => '',
			),
			array(
				'name' => 'Data Communications',
				'description' => '',
			),
			array(
				'name' => 'Advanced Data Communications',
				'description' => '',
			),
			array(
				'name' => 'Internship in Information Systems',
				'description' => '',
			),
			array(
				'name' => 'Sourcing of IS Development and Business Integration',
				'description' => '',
			),
			array(
				'name' => 'Seminar in Information Systems',
				'description' => '',
			),
			array(
				'name' => 'Seminar in Information Systems II',
				'description' => '',
			),
			array(
				'name' => 'Business Intelligence II',
				'description' => '',
			),
			array(
				'name' => 'Independent Study in Information Systems',
				'description' => '',
			),
			array(
				'name' => 'IS Development and Management',
				'description' => '',
			),
			array(
				'name' => 'Italian: Elementary Conversation',
				'description' => '',
			),
			array(
				'name' => 'Elementary Italian I',
				'description' => '',
			),
			array(
				'name' => 'Elementary Italian II',
				'description' => '',
			),
			array(
				'name' => 'Italian: Intermediate Conversation',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Italian I',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Italian II',
				'description' => '',
			),
			array(
				'name' => 'Italian: Advanced Conversation',
				'description' => '',
			),
			array(
				'name' => 'Third-Year Italian: Composition and Conversation',
				'description' => '',
			),
			array(
				'name' => 'Third-Year Readings in Italian: Subtitle Varies',
				'description' => '',
			),
			array(
				'name' => 'Italian Translation I',
				'description' => '',
			),
			array(
				'name' => 'Italian Culture and Civilization',
				'description' => '',
			),
			array(
				'name' => 'Italian Popular Culture',
				'description' => '',
			),
			array(
				'name' => 'Advanced Italian Grammar and Composition I',
				'description' => '',
			),
			array(
				'name' => 'Advanced Italian Grammar and Composition II',
				'description' => '',
			),
			array(
				'name' => 'Advanced Reading Proficiency in Italian',
				'description' => '',
			),
			array(
				'name' => 'Topics in Italian Literature',
				'description' => '',
			),
			array(
				'name' => 'Italian Culture Through Films',
				'description' => '',
			),
			array(
				'name' => 'Dante\'s Divine Comedy',
				'description' => '',
			),
			array(
				'name' => 'Boccaccio\'s Decameron',
				'description' => '',
			),
			array(
				'name' => 'Topics in Italian Studies',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Journalism and Media Studies',
				'description' => '',
			),
			array(
				'name' => 'Critical Analysis of the Mass Media',
				'description' => '',
			),
			array(
				'name' => 'News Reporting and Writing',
				'description' => '',
			),
			array(
				'name' => 'News Reporting and Writing Discussion',
				'description' => '',
			),
			array(
				'name' => 'Electronic Media Production I',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Public Relations',
				'description' => '',
			),
			array(
				'name' => 'Principles of Advertising',
				'description' => '',
			),
			array(
				'name' => 'Fundamentals of Applied Media Aesthetics',
				'description' => '',
			),
			array(
				'name' => 'Contemporary Audio',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Social Networks and Media',
				'description' => '',
			),
			array(
				'name' => 'Teaching Journalism',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Integrated Marketing Communications',
				'description' => '',
			),
			array(
				'name' => 'Design Principles for Advertising/Publications',
				'description' => '',
			),
			array(
				'name' => 'Media Ethics',
				'description' => '',
			),
			array(
				'name' => 'Advanced Reporting',
				'description' => '',
			),
			array(
				'name' => 'Photo Journalism',
				'description' => '',
			),
			array(
				'name' => 'Electronic Media Production II',
				'description' => '',
			),
			array(
				'name' => 'Media Planning and Buying',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Interactive Media Design',
				'description' => '',
			),
			array(
				'name' => 'Writing for Public Relations',
				'description' => '',
			),
			array(
				'name' => 'Advertising Copywriting',
				'description' => '',
			),
			array(
				'name' => 'Women and Media',
				'description' => '',
			),
			array(
				'name' => 'The First Amendment and Society',
				'description' => '',
			),
			array(
				'name' => 'Media Criticism',
				'description' => '',
			),
			array(
				'name' => 'News Editing',
				'description' => '',
			),
			array(
				'name' => 'History of Journalism',
				'description' => '',
			),
			array(
				'name' => 'Visual Literacy',
				'description' => '',
			),
			array(
				'name' => 'Electronic News Practicum',
				'description' => '',
			),
			array(
				'name' => 'IMC Competition',
				'description' => '',
			),
			array(
				'name' => 'Mass Communication Research Methods',
				'description' => '',
			),
			array(
				'name' => 'Broadcast Practicum',
				'description' => '',
			),
			array(
				'name' => 'Advanced Interactive Media Design',
				'description' => '',
			),
			array(
				'name' => 'Forms of Journalistic Writing',
				'description' => '',
			),
			array(
				'name' => 'Online Games, Virtual Worlds, and Social Networks',
				'description' => '',
			),
			array(
				'name' => 'Media Technologies and Society',
				'description' => '',
			),
			array(
				'name' => 'Issues in Advertising',
				'description' => '',
			),
			array(
				'name' => 'IMC Strategic Planning: Case Studies in Public Relations and Advertising',
				'description' => '',
			),
			array(
				'name' => 'Integrated Marketing Communication Campaigns',
				'description' => '',
			),
			array(
				'name' => 'Global Media',
				'description' => '',
			),
			array(
				'name' => 'Mass Media and Political Communication',
				'description' => '',
			),
			array(
				'name' => 'Mass Media and Society',
				'description' => '',
			),
			array(
				'name' => 'JOUR Interviewing',
				'description' => '',
			),
			array(
				'name' => 'Selected Topics',
				'description' => '',
			),
			array(
				'name' => 'Independent Studies',
				'description' => '',
			),
			array(
				'name' => 'Professional Internship',
				'description' => '',
			),
			array(
				'name' => 'Elementary Japanese I',
				'description' => '',
			),
			array(
				'name' => 'Elementary Japanese II',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Japanese I',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Japanese II',
				'description' => '',
			),
			array(
				'name' => 'Third-Year Japanese I',
				'description' => '',
			),
			array(
				'name' => 'Third-Year Japanese II',
				'description' => '',
			),
			array(
				'name' => 'Advanced Japanese Composition I',
				'description' => '',
			),
			array(
				'name' => 'Japanese for Business I',
				'description' => '',
			),
			array(
				'name' => 'Japanese for Business II',
				'description' => '',
			),
			array(
				'name' => 'Topics in Japanese Culture',
				'description' => '',
			),
			array(
				'name' => 'Foundations of Kinesiology',
				'description' => '',
			),
			array(
				'name' => 'Physical Activity and Health',
				'description' => '',
			),
			array(
				'name' => 'Exercise for the Overweight or Type II Diabetic',
				'description' => '',
			),
			array(
				'name' => 'Theory of Pool/Spa Operation',
				'description' => '',
			),
			array(
				'name' => 'Anatomical Kinesiology',
				'description' => '',
			),
			array(
				'name' => 'Social Psychology of Physical Activity',
				'description' => '',
			),
			array(
				'name' => 'Statistics for the Health Sciences',
				'description' => '',
			),
			array(
				'name' => 'Scientific Basis of Strength Development',
				'description' => '',
			),
			array(
				'name' => 'Advanced Personal Training',
				'description' => '',
			),
			array(
				'name' => 'Advanced Strength Methods',
				'description' => '',
			),
			array(
				'name' => 'Motor Behavior',
				'description' => '',
			),
			array(
				'name' => 'Motor Development Across the Lifespan',
				'description' => '',
			),
			array(
				'name' => 'Biomechanics',
				'description' => '',
			),
			array(
				'name' => 'History of Exercise and Sport Science',
				'description' => '',
			),
			array(
				'name' => 'Enhancing Mental and Motor Abilities',
				'description' => '',
			),
			array(
				'name' => 'Forensic Kinesiology',
				'description' => '',
			),
			array(
				'name' => 'Professional Development in Kinesiological Sciences',
				'description' => '',
			),
			array(
				'name' => 'Human Physiology',
				'description' => '',
			),
			array(
				'name' => 'Sport and Exercise Biomechanics',
				'description' => '',
			),
			array(
				'name' => 'Biomechanics of Endurance Performance',
				'description' => '',
			),
			array(
				'name' => 'Physical Activity in Aging',
				'description' => '',
			),
			array(
				'name' => 'Adult Development in Aging',
				'description' => '',
			),
			array(
				'name' => 'Seminar in Sport and Fitness Management',
				'description' => '',
			),
			array(
				'name' => 'Physical Activity and the Law',
				'description' => '',
			),
			array(
				'name' => 'Internship in Fitness and Sport Management',
				'description' => '',
			),
			array(
				'name' => 'Exercise Physiology',
				'description' => '',
			),
			array(
				'name' => 'Clinical Exercise Physiology',
				'description' => '',
			),
			array(
				'name' => 'Specialized Problems in Kinesiology',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Landscape Architecture',
				'description' => '',
			),
			array(
				'name' => 'Fundamentals of landscape architectural design I',
				'description' => '',
			),
			array(
				'name' => 'Grading and Drainage (Construction I)',
				'description' => '',
			),
			array(
				'name' => 'Irrigation (Construction II)',
				'description' => '',
			),
			array(
				'name' => 'History of Landscape Architecture',
				'description' => '',
			),
			array(
				'name' => 'Plant Materials',
				'description' => '',
			),
			array(
				'name' => 'Xeric Plant Materials',
				'description' => '',
			),
			array(
				'name' => 'CAD for Landscape Architecture',
				'description' => '',
			),
			array(
				'name' => 'Landscape Architecture Design I',
				'description' => '',
			),
			array(
				'name' => 'Landscape Architecture Design II',
				'description' => '',
			),
			array(
				'name' => 'Charrette',
				'description' => '',
			),
			array(
				'name' => 'Landscape Architecture Design III',
				'description' => '',
			),
			array(
				'name' => 'Landscape Architecture Design IV',
				'description' => '',
			),
			array(
				'name' => 'Landscape Architecture Structures',
				'description' => '',
			),
			array(
				'name' => 'Stormwater Management (Construction IV)',
				'description' => '',
			),
			array(
				'name' => 'Landscape Interpretation',
				'description' => '',
			),
			array(
				'name' => 'Landscape Architecture Design V',
				'description' => '',
			),
			array(
				'name' => 'Landscape Architecture Design VI',
				'description' => '',
			),
			array(
				'name' => 'Special Topics in Landscape Architecture',
				'description' => '',
			),
			array(
				'name' => 'Sustainable Design for the st Century City',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Latina/o Studies',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Latin American Studies',
				'description' => '',
			),
			array(
				'name' => 'Latin American Studies: Independent Study',
				'description' => '',
			),
			array(
				'name' => 'Elementary Latin I',
				'description' => '',
			),
			array(
				'name' => 'Elementary Latin II',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Latin I',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Latin II',
				'description' => '',
			),
			array(
				'name' => 'Latin Literature in Translation',
				'description' => '',
			),
			array(
				'name' => 'Language and Conceptualization',
				'description' => '',
			),
			array(
				'name' => 'Elementary Algebra',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Algebra',
				'description' => '',
			),
			array(
				'name' => 'Humane Mathematics',
				'description' => '',
			),
			array(
				'name' => 'Fundamentals of College Mathematics',
				'description' => '',
			),
			array(
				'name' => 'Mathematical Topics and Applications Provided in a Real World Context',
				'description' => '',
			),
			array(
				'name' => 'Number Concepts for Elementary School Teachers',
				'description' => '',
			),
			array(
				'name' => 'Statistical and Geometrical Concepts for Elementary School Teachers',
				'description' => '',
			),
			array(
				'name' => 'College Algebra',
				'description' => '',
			),
			array(
				'name' => 'Precalculus I',
				'description' => '',
			),
			array(
				'name' => 'Precalculus II',
				'description' => '',
			),
			array(
				'name' => 'Precalculus and Trigonometry',
				'description' => '',
			),
			array(
				'name' => 'Finite Mathematics',
				'description' => '',
			),
			array(
				'name' => 'Mathematics of Finance',
				'description' => '',
			),
			array(
				'name' => 'Introductory Calculus for Business and Social Sciences',
				'description' => '',
			),
			array(
				'name' => 'Calculus I',
				'description' => '',
			),
			array(
				'name' => 'Calculus II',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Problem Solving Techniques',
				'description' => '',
			),
			array(
				'name' => 'Geometry for Middle School Teachers',
				'description' => '',
			),
			array(
				'name' => 'Discrete Mathematics I',
				'description' => '',
			),
			array(
				'name' => 'Elementary Probability',
				'description' => '',
			),
			array(
				'name' => 'Calculus III',
				'description' => '',
			),
			array(
				'name' => 'Probability and Combinatorics for Teachers',
				'description' => '',
			),
			array(
				'name' => 'History of Mathematics',
				'description' => '',
			),
			array(
				'name' => 'Mathematics of Interest',
				'description' => '',
			),
			array(
				'name' => 'Linear Algebra',
				'description' => '',
			),
			array(
				'name' => 'Discrete Mathematics II',
				'description' => '',
			),
			array(
				'name' => 'Computational Linear Algebra',
				'description' => '',
			),
			array(
				'name' => 'Graph Theory',
				'description' => '',
			),
			array(
				'name' => 'Differential Equations I',
				'description' => '',
			),
			array(
				'name' => 'Differential Equations II',
				'description' => '',
			),
			array(
				'name' => 'Mathematics for Engineers and Scientists I',
				'description' => '',
			),
			array(
				'name' => 'Mathematics for Engineers and Scientists II',
				'description' => '',
			),
			array(
				'name' => 'Foundations of Mathematics I',
				'description' => '',
			),
			array(
				'name' => 'Foundations of Mathematics II',
				'description' => '',
			),
			array(
				'name' => 'Abstract Algebra I',
				'description' => '',
			),
			array(
				'name' => 'Abstract Algebra II',
				'description' => '',
			),
			array(
				'name' => 'Elementary Theory of Numbers I',
				'description' => '',
			),
			array(
				'name' => 'Elementary Theory of Numbers II',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Real Analysis I',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Real Analysis II',
				'description' => '',
			),
			array(
				'name' => 'Elementary Complex Analysis',
				'description' => '',
			),
			array(
				'name' => 'Probability Theory',
				'description' => '',
			),
			array(
				'name' => 'Stochastic Processes',
				'description' => '',
			),
			array(
				'name' => 'Advanced Matrix Theory and Applications',
				'description' => '',
			),
			array(
				'name' => 'Numerical Methods I',
				'description' => '',
			),
			array(
				'name' => 'Numerical Methods II',
				'description' => '',
			),
			array(
				'name' => 'Combinatorics I',
				'description' => '',
			),
			array(
				'name' => 'Combinatorics II',
				'description' => '',
			),
			array(
				'name' => 'Actuarial Mathematics I',
				'description' => '',
			),
			array(
				'name' => 'Actuarial Mathematics II',
				'description' => '',
			),
			array(
				'name' => 'Risk Theory',
				'description' => '',
			),
			array(
				'name' => 'College Geometry',
				'description' => '',
			),
			array(
				'name' => 'General Topology I',
				'description' => '',
			),
			array(
				'name' => 'General Topology II',
				'description' => '',
			),
			array(
				'name' => 'Partial Differential Equations',
				'description' => '',
			),
			array(
				'name' => 'Advanced Mathematical Topics',
				'description' => '',
			),
			array(
				'name' => 'Problem Solving Workshop',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Mechanical and Aerospace Engineering',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Mechanical and Aerospace Engineering Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Private Pilot Ground School',
				'description' => '',
			),
			array(
				'name' => 'Introduction to AUTOCAD',
				'description' => '',
			),
			array(
				'name' => 'Machine Shop Practices',
				'description' => '',
			),
			array(
				'name' => '3D Modeling with Pro Engineer',
				'description' => '',
			),
			array(
				'name' => 'Principles of CNC',
				'description' => '',
			),
			array(
				'name' => '3D Modeling with Solidworks',
				'description' => '',
			),
			array(
				'name' => 'Dynamics',
				'description' => '',
			),
			array(
				'name' => 'Structure and Properties of Solids',
				'description' => '',
			),
			array(
				'name' => 'Materials Mechanics',
				'description' => '',
			),
			array(
				'name' => 'Mechanical Testing Lab',
				'description' => '',
			),
			array(
				'name' => 'Engineering Thermodynamics I',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Heat Transfer',
				'description' => '',
			),
			array(
				'name' => 'Thermal Engineering Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Programming for Mechanical Engineers',
				'description' => '',
			),
			array(
				'name' => 'Dynamics of Machines',
				'description' => '',
			),
			array(
				'name' => 'Analysis of Dynamic Systems',
				'description' => '',
			),
			array(
				'name' => 'Engineering Measurements',
				'description' => '',
			),
			array(
				'name' => 'Engineering Measurements Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Safety Engineering I',
				'description' => '',
			),
			array(
				'name' => 'Fluid Dynamics for Mechanical Engineers',
				'description' => '',
			),
			array(
				'name' => 'Fluid Dynamics Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Fluid Mechanics',
				'description' => '',
			),
			array(
				'name' => 'Computational Methods for Engineers',
				'description' => '',
			),
			array(
				'name' => 'Sizing Solar Energy Systems',
				'description' => '',
			),
			array(
				'name' => 'Design of Thermal Systems',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Biomechanical Engineering',
				'description' => '',
			),
			array(
				'name' => 'Fuel Cell Fundamentals',
				'description' => '',
			),
			array(
				'name' => 'Air Conditioning Engineering Systems',
				'description' => '',
			),
			array(
				'name' => 'Advanced HVAC and Energy Conservation Systems',
				'description' => '',
			),
			array(
				'name' => 'Automatic Controls',
				'description' => '',
			),
			array(
				'name' => 'Automatic Controls Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Robotics',
				'description' => '',
			),
			array(
				'name' => 'Manufacturing Processes',
				'description' => '',
			),
			array(
				'name' => 'Manufacturing Systems',
				'description' => '',
			),
			array(
				'name' => 'Computer Control of Machines and Processes',
				'description' => '',
			),
			array(
				'name' => 'Corrosion Engineering',
				'description' => '',
			),
			array(
				'name' => 'Noise Control',
				'description' => '',
			),
			array(
				'name' => 'Mechanical Engineering Design',
				'description' => '',
			),
			array(
				'name' => 'Advanced Mechanical Engineering Design',
				'description' => '',
			),
			array(
				'name' => 'Advanced Mechanism Design',
				'description' => '',
			),
			array(
				'name' => 'Design Techniques in Mechanical Engineering',
				'description' => '',
			),
			array(
				'name' => 'Composite Materials',
				'description' => '',
			),
			array(
				'name' => 'Mechanical Vibrations',
				'description' => '',
			),
			array(
				'name' => 'Physical Metallurgy',
				'description' => '',
			),
			array(
				'name' => 'Fundamentals of Nuclear Engineering',
				'description' => '',
			),
			array(
				'name' => 'High School Mentoring for Engineering Design',
				'description' => '',
			),
			array(
				'name' => 'Vehicle Design Projects',
				'description' => '',
			),
			array(
				'name' => 'Experimental Mechanics of Materials',
				'description' => '',
			),
			array(
				'name' => 'Gas Dynamics',
				'description' => '',
			),
			array(
				'name' => 'Aerodynamics',
				'description' => '',
			),
			array(
				'name' => 'Special Topics in Engineering',
				'description' => '',
			),
			array(
				'name' => 'Personal Growth',
				'description' => '',
			),
			array(
				'name' => 'Multicultural Issues and Families',
				'description' => '',
			),
			array(
				'name' => 'Human Sexuality',
				'description' => '',
			),
			array(
				'name' => 'Contemporary Marriage and Families',
				'description' => '',
			),
			array(
				'name' => 'Successful Couple and Marital Relationships',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Marriage and Family Therapy',
				'description' => '',
			),
			array(
				'name' => 'Principles of Management and Organizational Behavior',
				'description' => '',
			),
			array(
				'name' => 'Small Business Management',
				'description' => '',
			),
			array(
				'name' => 'Business Law & Society',
				'description' => '',
			),
			array(
				'name' => 'Technology Entrepreneurship-Lean Start-ups',
				'description' => '',
			),
			array(
				'name' => 'Applied Entrepreneurship',
				'description' => '',
			),
			array(
				'name' => 'Principles of Supervision',
				'description' => '',
			),
			array(
				'name' => 'Human Resource Management',
				'description' => '',
			),
			array(
				'name' => 'Business and Society',
				'description' => '',
			),
			array(
				'name' => 'Systems Simulation',
				'description' => '',
			),
			array(
				'name' => 'Collective Bargaining and Public Policy',
				'description' => '',
			),
			array(
				'name' => 'Employment Law',
				'description' => '',
			),
			array(
				'name' => 'Compensation',
				'description' => '',
			),
			array(
				'name' => 'Leadership & Managerial Skills',
				'description' => '',
			),
			array(
				'name' => 'Seminar in Human Resource Management',
				'description' => '',
			),
			array(
				'name' => 'International Management',
				'description' => '',
			),
			array(
				'name' => 'Negotiation',
				'description' => '',
			),
			array(
				'name' => 'Seminar in Quantitative Management Systems',
				'description' => '',
			),
			array(
				'name' => 'Advanced Organizational Behavior',
				'description' => '',
			),
			array(
				'name' => 'Seminar in Entrepreneurship',
				'description' => '',
			),
			array(
				'name' => 'Seminar in Management',
				'description' => '',
			),
			array(
				'name' => 'Advanced Decision Systems',
				'description' => '',
			),
			array(
				'name' => 'Business Plan Creation',
				'description' => '',
			),
			array(
				'name' => 'Leadership Lab',
				'description' => '',
			),
			array(
				'name' => 'Basic Military Skills I',
				'description' => '',
			),
			array(
				'name' => 'Basic Military Skills II',
				'description' => '',
			),
			array(
				'name' => 'Leadership and Management I',
				'description' => '',
			),
			array(
				'name' => 'Leadership and Management II',
				'description' => '',
			),
			array(
				'name' => 'Leader\'s Training Course',
				'description' => '',
			),
			array(
				'name' => 'Leadership in Small Unit Operations',
				'description' => '',
			),
			array(
				'name' => 'Advanced Leadership Development',
				'description' => '',
			),
			array(
				'name' => 'Advanced Topics in Leadership',
				'description' => '',
			),
			array(
				'name' => 'Leadership Development and Assessment Course',
				'description' => '',
			),
			array(
				'name' => 'Adaptive Leadership',
				'description' => '',
			),
			array(
				'name' => 'Leadership in a Complex World',
				'description' => '',
			),
			array(
				'name' => 'Marketing Management',
				'description' => '',
			),
			array(
				'name' => 'Buyer Behavior',
				'description' => '',
			),
			array(
				'name' => 'Principles of Internet Marketing',
				'description' => '',
			),
			array(
				'name' => 'Marketing Research',
				'description' => '',
			),
			array(
				'name' => 'Advertising and Promotional Management',
				'description' => '',
			),
			array(
				'name' => 'Advertising Campaigns',
				'description' => '',
			),
			array(
				'name' => 'Distribution Systems',
				'description' => '',
			),
			array(
				'name' => 'Retailing Management',
				'description' => '',
			),
			array(
				'name' => 'Competitive Strategies for Product and Price Management',
				'description' => '',
			),
			array(
				'name' => 'Services Marketing',
				'description' => '',
			),
			array(
				'name' => 'International Marketing',
				'description' => '',
			),
			array(
				'name' => 'Selling in Organizational Markets',
				'description' => '',
			),
			array(
				'name' => 'Database Marketing',
				'description' => '',
			),
			array(
				'name' => 'Direct Marketing',
				'description' => '',
			),
			array(
				'name' => 'Marketing Planning and Analysis',
				'description' => '',
			),
			array(
				'name' => 'Sports Marketing',
				'description' => '',
			),
			array(
				'name' => 'Marketing Internship',
				'description' => '',
			),
			array(
				'name' => 'Independent Study in Marketing',
				'description' => '',
			),
			array(
				'name' => 'Advanced Seminar in Marketing',
				'description' => '',
			),
			array(
				'name' => 'Experience Marketing',
				'description' => '',
			),
			array(
				'name' => 'Marketing Policies',
				'description' => '',
			),
			array(
				'name' => 'Concert Attendance',
				'description' => '',
			),
			array(
				'name' => 'Music Fundamentals',
				'description' => '',
			),
			array(
				'name' => 'Beginning Music Theory',
				'description' => '',
			),
			array(
				'name' => 'Voice Class I',
				'description' => '',
			),
			array(
				'name' => 'Voice Class II',
				'description' => '',
			),
			array(
				'name' => 'Vocal Techniques',
				'description' => '',
			),
			array(
				'name' => 'Guitar Class I',
				'description' => '',
			),
			array(
				'name' => 'Guitar Class II',
				'description' => '',
			),
			array(
				'name' => 'Functional Piano I',
				'description' => '',
			),
			array(
				'name' => 'Functional Piano II',
				'description' => '',
			),
			array(
				'name' => 'Piano Class I',
				'description' => '',
			),
			array(
				'name' => 'Piano Class II',
				'description' => '',
			),
			array(
				'name' => 'Fundamentals of Music Composition I',
				'description' => '',
			),
			array(
				'name' => 'Singing for Actors I',
				'description' => '',
			),
			array(
				'name' => 'Singing for Actors II',
				'description' => '',
			),
			array(
				'name' => 'Music Appreciation',
				'description' => '',
			),
			array(
				'name' => 'History of Rock Music',
				'description' => '',
			),
			array(
				'name' => 'Sex and Violence in Opera',
				'description' => '',
			),
			array(
				'name' => 'Broadway\'s Greatest Composers',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Music Literature',
				'description' => '',
			),
			array(
				'name' => 'History of the Beatles',
				'description' => '',
			),
			array(
				'name' => 'Jazz Appreciation',
				'description' => '',
			),
			array(
				'name' => 'History of American Popular Music',
				'description' => '',
			),
			array(
				'name' => 'British Invasion - 60s Music',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Music Technology',
				'description' => '',
			),
			array(
				'name' => 'Diction for Singers I',
				'description' => '',
			),
			array(
				'name' => 'Diction for Singers II',
				'description' => '',
			),
			array(
				'name' => 'Piano Proficiency',
				'description' => '',
			),
			array(
				'name' => 'Musical Theatre Workshop I',
				'description' => '',
			),
			array(
				'name' => 'Musical Theatre Practicum I',
				'description' => '',
			),
			array(
				'name' => 'Musical Theatre Practicum II',
				'description' => '',
			),
			array(
				'name' => 'Business of Music',
				'description' => '',
			),
			array(
				'name' => 'Basic Musicianship IE',
				'description' => '',
			),
			array(
				'name' => 'Basic Musicianship IF',
				'description' => '',
			),
			array(
				'name' => 'Basic Musicianship IIE',
				'description' => '',
			),
			array(
				'name' => 'Basic Musicianship IIF',
				'description' => '',
			),
			array(
				'name' => 'Functional Piano III',
				'description' => '',
			),
			array(
				'name' => 'Functional Piano IV',
				'description' => '',
			),
			array(
				'name' => 'Fundamentals of Music Composition II',
				'description' => '',
			),
			array(
				'name' => 'Techniques of Songwriting',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Film Scoring',
				'description' => '',
			),
			array(
				'name' => 'Music Technology II',
				'description' => '',
			),
			array(
				'name' => 'Recording Technology I',
				'description' => '',
			),
			array(
				'name' => 'Recording Technology II',
				'description' => '',
			),
			array(
				'name' => 'Finale TM: An Introduction',
				'description' => '',
			),
			array(
				'name' => 'Virtual Studio Technology',
				'description' => '',
			),
			array(
				'name' => 'Jazz Fundamentals I',
				'description' => '',
			),
			array(
				'name' => 'Jazz Fundamentals II',
				'description' => '',
			),
			array(
				'name' => 'Jazz Keyboard',
				'description' => '',
			),
			array(
				'name' => 'Elementary Jazz Improvisation',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Jazz Singing',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Music Education',
				'description' => '',
			),
			array(
				'name' => 'Choral Conducting Lab',
				'description' => '',
			),
			array(
				'name' => 'Advanced Musicianship IE',
				'description' => '',
			),
			array(
				'name' => 'Advanced Musicianship IF',
				'description' => '',
			),
			array(
				'name' => 'Advanced Musicianship IIE',
				'description' => '',
			),
			array(
				'name' => 'Advanced Musicianship IIF',
				'description' => '',
			),
			array(
				'name' => 'Multimedia for the Professional',
				'description' => '',
			),
			array(
				'name' => 'Large Console Recording',
				'description' => '',
			),
			array(
				'name' => 'Studio Recording III',
				'description' => '',
			),
			array(
				'name' => 'Piano Literature I',
				'description' => '',
			),
			array(
				'name' => 'Piano Literature II',
				'description' => '',
			),
			array(
				'name' => 'Music History I',
				'description' => '',
			),
			array(
				'name' => 'Music History II',
				'description' => '',
			),
			array(
				'name' => 'Music History III',
				'description' => '',
			),
			array(
				'name' => 'Jazz History I',
				'description' => '',
			),
			array(
				'name' => 'Jazz History II',
				'description' => '',
			),
			array(
				'name' => 'Issues in American Music',
				'description' => '',
			),
			array(
				'name' => 'Jazz Vocal Styles I',
				'description' => '',
			),
			array(
				'name' => 'Jazz Vocal Styles II',
				'description' => '',
			),
			array(
				'name' => 'Jazz Form and Analysis',
				'description' => '',
			),
			array(
				'name' => 'Advanced Jazz Improvisation',
				'description' => '',
			),
			array(
				'name' => 'Beginning Jazz Arranging and Composition',
				'description' => '',
			),
			array(
				'name' => 'Advanced Jazz Vocal Arranging and Composition',
				'description' => '',
			),
			array(
				'name' => 'Beginning Conducting',
				'description' => '',
			),
			array(
				'name' => 'Beginning Orchestration',
				'description' => '',
			),
			array(
				'name' => 'Advanced Instrumental Conducting',
				'description' => '',
			),
			array(
				'name' => 'Advanced Choral Conducting',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Orff Schulwerk',
				'description' => '',
			),
			array(
				'name' => 'Instrumental Methods',
				'description' => '',
			),
			array(
				'name' => 'Choral Methods',
				'description' => '',
			),
			array(
				'name' => 'Teaching General Music',
				'description' => '',
			),
			array(
				'name' => 'String Class Methods',
				'description' => '',
			),
			array(
				'name' => 'String Class Methods (High)',
				'description' => '',
			),
			array(
				'name' => 'String Class Methods (Low)',
				'description' => '',
			),
			array(
				'name' => 'Percussion Class Methods',
				'description' => '',
			),
			array(
				'name' => 'Percussion Class Methods (Sn/KeyTimp/Aux)',
				'description' => '',
			),
			array(
				'name' => 'Percussion Class Methods (Lat/Mul/Mar/Set)',
				'description' => '',
			),
			array(
				'name' => 'Brass Class Methods',
				'description' => '',
			),
			array(
				'name' => 'Brass Class Methods (High)',
				'description' => '',
			),
			array(
				'name' => 'Brass Class Methods (Low)',
				'description' => '',
			),
			array(
				'name' => 'Woodwind Class Methods',
				'description' => '',
			),
			array(
				'name' => 'Woodwind Class Methods (single reed/flute)',
				'description' => '',
			),
			array(
				'name' => 'Woodwind Class Methods (double reeds)',
				'description' => '',
			),
			array(
				'name' => 'Rhythm Section Methods',
				'description' => '',
			),
			array(
				'name' => 'Teaching of Marching Band Techniques',
				'description' => '',
			),
			array(
				'name' => 'Junior Recital Music Education',
				'description' => '',
			),
			array(
				'name' => 'Junior Recital Applied',
				'description' => '',
			),
			array(
				'name' => 'Counterpoint',
				'description' => '',
			),
			array(
				'name' => 'Theory Review',
				'description' => '',
			),
			array(
				'name' => 'Advanced Musicianship IIIE',
				'description' => '',
			),
			array(
				'name' => 'Advanced Musicianship IIIF',
				'description' => '',
			),
			array(
				'name' => 'Keyboard Harmony',
				'description' => '',
			),
			array(
				'name' => 'Form and Analysis',
				'description' => '',
			),
			array(
				'name' => 'Choral Literature',
				'description' => '',
			),
			array(
				'name' => 'Instrumental Literature',
				'description' => '',
			),
			array(
				'name' => 'Vocal Pedagogy',
				'description' => '',
			),
			array(
				'name' => 'Piano Pedagogy',
				'description' => '',
			),
			array(
				'name' => 'Instrumental Pedagogy',
				'description' => '',
			),
			array(
				'name' => 'Vocal Literature',
				'description' => '',
			),
			array(
				'name' => 'Interpretation: German Lied',
				'description' => '',
			),
			array(
				'name' => 'French Mélodie',
				'description' => '',
			),
			array(
				'name' => 'Advanced HD and Surround Sound',
				'description' => '',
			),
			array(
				'name' => 'Choral Music Methods',
				'description' => '',
			),
			array(
				'name' => 'Grand Piano Tuning and Maintenance',
				'description' => '',
			),
			array(
				'name' => 'Competitive Drumline Techniques',
				'description' => '',
			),
			array(
				'name' => 'Jazz Band Methods',
				'description' => '',
			),
			array(
				'name' => 'Practicum I: General Music',
				'description' => '',
			),
			array(
				'name' => 'Practicum II: Choral/Vocal',
				'description' => '',
			),
			array(
				'name' => 'Practicum 3: Instrumental',
				'description' => '',
			),
			array(
				'name' => 'Music Skills for Classroom Teachers',
				'description' => '',
			),
			array(
				'name' => 'Music Methods for Exceptional Children',
				'description' => '',
			),
			array(
				'name' => 'Jazz Keyboard Seminar',
				'description' => '',
			),
			array(
				'name' => 'Jazz Improvisation Seminar',
				'description' => '',
			),
			array(
				'name' => 'Advanced Jazz Arranging',
				'description' => '',
			),
			array(
				'name' => 'Advanced Orchestration',
				'description' => '',
			),
			array(
				'name' => 'Endangered Instrument Project Teaching Practicum',
				'description' => '',
			),
			array(
				'name' => 'Musical Theatre Literature',
				'description' => '',
			),
			array(
				'name' => 'Musical Theatre Workshop II',
				'description' => '',
			),
			array(
				'name' => 'Body Mapping',
				'description' => '',
			),
			array(
				'name' => 'Secondary Supervised Student Teaching: Music',
				'description' => '',
			),
			array(
				'name' => 'Supervised Student Teaching Seminar: Music',
				'description' => '',
			),
			array(
				'name' => 'Music Internship',
				'description' => '',
			),
			array(
				'name' => 'Seminar: Special Topics',
				'description' => '',
			),
			array(
				'name' => 'Senior Recital - Applied',
				'description' => '',
			),
			array(
				'name' => 'Bass I',
				'description' => '',
			),
			array(
				'name' => 'Bass II',
				'description' => '',
			),
			array(
				'name' => 'Bassoon I',
				'description' => '',
			),
			array(
				'name' => 'Bassoon II',
				'description' => '',
			),
			array(
				'name' => 'Cello I',
				'description' => '',
			),
			array(
				'name' => 'Cello II',
				'description' => '',
			),
			array(
				'name' => 'Clarinet I',
				'description' => '',
			),
			array(
				'name' => 'Clarinet II',
				'description' => '',
			),
			array(
				'name' => 'Euphonium I',
				'description' => '',
			),
			array(
				'name' => 'Euphonium II',
				'description' => '',
			),
			array(
				'name' => 'Flute I',
				'description' => '',
			),
			array(
				'name' => 'Flute II',
				'description' => '',
			),
			array(
				'name' => 'Guitar I',
				'description' => '',
			),
			array(
				'name' => 'Guitar II',
				'description' => '',
			),
			array(
				'name' => 'Harp I',
				'description' => '',
			),
			array(
				'name' => 'Harp II',
				'description' => '',
			),
			array(
				'name' => 'Horn I',
				'description' => '',
			),
			array(
				'name' => 'Horn II',
				'description' => '',
			),
			array(
				'name' => 'Oboe I',
				'description' => '',
			),
			array(
				'name' => 'Oboe II',
				'description' => '',
			),
			array(
				'name' => 'Organ I',
				'description' => '',
			),
			array(
				'name' => 'Organ II',
				'description' => '',
			),
			array(
				'name' => 'Percussion I',
				'description' => '',
			),
			array(
				'name' => 'Percussion II',
				'description' => '',
			),
			array(
				'name' => 'Piano I',
				'description' => '',
			),
			array(
				'name' => 'Piano II',
				'description' => '',
			),
			array(
				'name' => 'Saxophone I',
				'description' => '',
			),
			array(
				'name' => 'Saxophone II',
				'description' => '',
			),
			array(
				'name' => 'MIDI for Music Technology',
				'description' => '',
			),
			array(
				'name' => 'Trombone I',
				'description' => '',
			),
			array(
				'name' => 'Trombone II',
				'description' => '',
			),
			array(
				'name' => 'Trumpet I',
				'description' => '',
			),
			array(
				'name' => 'Trumpet II',
				'description' => '',
			),
			array(
				'name' => 'Tuba I',
				'description' => '',
			),
			array(
				'name' => 'Tuba II',
				'description' => '',
			),
			array(
				'name' => 'Viola I',
				'description' => '',
			),
			array(
				'name' => 'Viola II',
				'description' => '',
			),
			array(
				'name' => 'Violin I',
				'description' => '',
			),
			array(
				'name' => 'Violin II',
				'description' => '',
			),
			array(
				'name' => 'Voice I',
				'description' => '',
			),
			array(
				'name' => 'Voice II',
				'description' => '',
			),
			array(
				'name' => 'Voice for Musical Theatre Majors',
				'description' => '',
			),
			array(
				'name' => 'Voice for Musical Theatre Majors II',
				'description' => '',
			),
			array(
				'name' => 'Bass for Non-Majors',
				'description' => '',
			),
			array(
				'name' => 'Bassoon for Non-Majors',
				'description' => '',
			),
			array(
				'name' => 'Cello for Non-Majors',
				'description' => '',
			),
			array(
				'name' => 'Clarinet for Non-Majors',
				'description' => '',
			),
			array(
				'name' => 'Euphonium for Non-Majors',
				'description' => '',
			),
			array(
				'name' => 'Flute for Non-Majors',
				'description' => '',
			),
			array(
				'name' => 'Guitar for Non-Majors',
				'description' => '',
			),
			array(
				'name' => 'Harp for Non-Majors',
				'description' => '',
			),
			array(
				'name' => 'Horn for Non-Majors',
				'description' => '',
			),
			array(
				'name' => 'Oboe for Non-Majors',
				'description' => '',
			),
			array(
				'name' => 'Organ for Non-Majors',
				'description' => '',
			),
			array(
				'name' => 'Percussion for Non-Majors',
				'description' => '',
			),
			array(
				'name' => 'Piano for Non-Majors',
				'description' => '',
			),
			array(
				'name' => 'Saxophone for Non-Majors',
				'description' => '',
			),
			array(
				'name' => 'Trombone for Non-Majors',
				'description' => '',
			),
			array(
				'name' => 'Trumpet for Non-Majors',
				'description' => '',
			),
			array(
				'name' => 'Tuba for Non-Majors',
				'description' => '',
			),
			array(
				'name' => 'Viola for Non Major',
				'description' => '',
			),
			array(
				'name' => 'Violin for Non-Majors',
				'description' => '',
			),
			array(
				'name' => 'Voice for Non-Majors',
				'description' => '',
			),
			array(
				'name' => 'Bass III',
				'description' => '',
			),
			array(
				'name' => 'Bass IV',
				'description' => '',
			),
			array(
				'name' => 'Bassoon III',
				'description' => '',
			),
			array(
				'name' => 'Bassoon IV',
				'description' => '',
			),
			array(
				'name' => 'Cello III',
				'description' => '',
			),
			array(
				'name' => 'Cello IV',
				'description' => '',
			),
			array(
				'name' => 'Clarinet III',
				'description' => '',
			),
			array(
				'name' => 'Clarinet IV',
				'description' => '',
			),
			array(
				'name' => 'Euphonium III',
				'description' => '',
			),
			array(
				'name' => 'Euphonium IV',
				'description' => '',
			),
			array(
				'name' => 'Flute III',
				'description' => '',
			),
			array(
				'name' => 'Flute IV',
				'description' => '',
			),
			array(
				'name' => 'Guitar III',
				'description' => '',
			),
			array(
				'name' => 'Guitar IV',
				'description' => '',
			),
			array(
				'name' => 'Harp III',
				'description' => '',
			),
			array(
				'name' => 'Harp IV',
				'description' => '',
			),
			array(
				'name' => 'Horn III',
				'description' => '',
			),
			array(
				'name' => 'Horn IV',
				'description' => '',
			),
			array(
				'name' => 'Oboe III',
				'description' => '',
			),
			array(
				'name' => 'Oboe IV',
				'description' => '',
			),
			array(
				'name' => 'Organ III',
				'description' => '',
			),
			array(
				'name' => 'Organ IV',
				'description' => '',
			),
			array(
				'name' => 'Percussion III',
				'description' => '',
			),
			array(
				'name' => 'Percussion IV',
				'description' => '',
			),
			array(
				'name' => 'Piano III',
				'description' => '',
			),
			array(
				'name' => 'Piano IV',
				'description' => '',
			),
			array(
				'name' => 'Saxophone III',
				'description' => '',
			),
			array(
				'name' => 'Saxophone IV',
				'description' => '',
			),
			array(
				'name' => 'Advanced Concepts in Computer Music',
				'description' => '',
			),
			array(
				'name' => 'Trombone III',
				'description' => '',
			),
			array(
				'name' => 'Trombone IV',
				'description' => '',
			),
			array(
				'name' => 'Trumpet III',
				'description' => '',
			),
			array(
				'name' => 'Trumpet IV',
				'description' => '',
			),
			array(
				'name' => 'Tuba III',
				'description' => '',
			),
			array(
				'name' => 'Tuba IV',
				'description' => '',
			),
			array(
				'name' => 'Viola III',
				'description' => '',
			),
			array(
				'name' => 'Viola IV',
				'description' => '',
			),
			array(
				'name' => 'Violin III',
				'description' => '',
			),
			array(
				'name' => 'Violin IV',
				'description' => '',
			),
			array(
				'name' => 'Voice III',
				'description' => '',
			),
			array(
				'name' => 'Voice IV',
				'description' => '',
			),
			array(
				'name' => 'Voice for Musical Theatre Majors III',
				'description' => '',
			),
			array(
				'name' => 'Voice for Musical Theatre Majors IV',
				'description' => '',
			),
			array(
				'name' => 'Piano for Music Educators',
				'description' => '',
			),
			array(
				'name' => 'Bass V',
				'description' => '',
			),
			array(
				'name' => 'Bass VI',
				'description' => '',
			),
			array(
				'name' => 'Bassoon V',
				'description' => '',
			),
			array(
				'name' => 'Bassoon VI',
				'description' => '',
			),
			array(
				'name' => 'Cello V',
				'description' => '',
			),
			array(
				'name' => 'Cello VI',
				'description' => '',
			),
			array(
				'name' => 'Clarinet V',
				'description' => '',
			),
			array(
				'name' => 'Clarinet VI',
				'description' => '',
			),
			array(
				'name' => 'Euphonium- V',
				'description' => '',
			),
			array(
				'name' => 'Euphonium VI',
				'description' => '',
			),
			array(
				'name' => 'Flute V',
				'description' => '',
			),
			array(
				'name' => 'Flute VI',
				'description' => '',
			),
			array(
				'name' => 'Guitar V',
				'description' => '',
			),
			array(
				'name' => 'Guitar VI',
				'description' => '',
			),
			array(
				'name' => 'Harp V',
				'description' => '',
			),
			array(
				'name' => 'Harp VI',
				'description' => '',
			),
			array(
				'name' => 'Horn V',
				'description' => '',
			),
			array(
				'name' => 'Horn VI',
				'description' => '',
			),
			array(
				'name' => 'Oboe V',
				'description' => '',
			),
			array(
				'name' => 'Oboe VI',
				'description' => '',
			),
			array(
				'name' => 'Organ V',
				'description' => '',
			),
			array(
				'name' => 'Organ VI',
				'description' => '',
			),
			array(
				'name' => 'Percussion V',
				'description' => '',
			),
			array(
				'name' => 'Percussion VI',
				'description' => '',
			),
			array(
				'name' => 'Piano V',
				'description' => '',
			),
			array(
				'name' => 'Piano VI',
				'description' => '',
			),
			array(
				'name' => 'Saxophone V',
				'description' => '',
			),
			array(
				'name' => 'Saxophone VI',
				'description' => '',
			),
			array(
				'name' => 'Trombone V',
				'description' => '',
			),
			array(
				'name' => 'Trombone VI',
				'description' => '',
			),
			array(
				'name' => 'Trumpet V',
				'description' => '',
			),
			array(
				'name' => 'Trumpet VI',
				'description' => '',
			),
			array(
				'name' => 'Tuba V',
				'description' => '',
			),
			array(
				'name' => 'Tuba VI',
				'description' => '',
			),
			array(
				'name' => 'Viola V',
				'description' => '',
			),
			array(
				'name' => 'Viola VI',
				'description' => '',
			),
			array(
				'name' => 'Violin V',
				'description' => '',
			),
			array(
				'name' => 'Violin VI',
				'description' => '',
			),
			array(
				'name' => 'Voice V',
				'description' => '',
			),
			array(
				'name' => 'Voice VI',
				'description' => '',
			),
			array(
				'name' => 'Voice for Musical Theatre Major',
				'description' => '',
			),
			array(
				'name' => 'Voice for Musical Theatre Majors VI',
				'description' => '',
			),
			array(
				'name' => 'Bass VII',
				'description' => '',
			),
			array(
				'name' => 'Bass VIII',
				'description' => '',
			),
			array(
				'name' => 'Bassoon VII',
				'description' => '',
			),
			array(
				'name' => 'Bassoon VIII',
				'description' => '',
			),
			array(
				'name' => 'Cello VII',
				'description' => '',
			),
			array(
				'name' => 'Cello VIII',
				'description' => '',
			),
			array(
				'name' => 'Clarinet VII',
				'description' => '',
			),
			array(
				'name' => 'Clarinet VIII',
				'description' => '',
			),
			array(
				'name' => 'Euphonium VII',
				'description' => '',
			),
			array(
				'name' => 'Euphonium VIII',
				'description' => '',
			),
			array(
				'name' => 'Flute VII',
				'description' => '',
			),
			array(
				'name' => 'Flute VIII',
				'description' => '',
			),
			array(
				'name' => 'Guitar VII',
				'description' => '',
			),
			array(
				'name' => 'Guitar VIII',
				'description' => '',
			),
			array(
				'name' => 'Harp VII',
				'description' => '',
			),
			array(
				'name' => 'Harp VIII',
				'description' => '',
			),
			array(
				'name' => 'Horn VII',
				'description' => '',
			),
			array(
				'name' => 'Horn VIII',
				'description' => '',
			),
			array(
				'name' => 'Oboe VII',
				'description' => '',
			),
			array(
				'name' => 'Oboe VIII',
				'description' => '',
			),
			array(
				'name' => 'Organ VII',
				'description' => '',
			),
			array(
				'name' => 'Organ VIII',
				'description' => '',
			),
			array(
				'name' => 'Percussion VII',
				'description' => '',
			),
			array(
				'name' => 'Percussion VIII',
				'description' => '',
			),
			array(
				'name' => 'Piano VII',
				'description' => '',
			),
			array(
				'name' => 'Piano VIII',
				'description' => '',
			),
			array(
				'name' => 'Saxophone VII',
				'description' => '',
			),
			array(
				'name' => 'Saxophone VIII',
				'description' => '',
			),
			array(
				'name' => 'Trombone VII',
				'description' => '',
			),
			array(
				'name' => 'Trombone VIII',
				'description' => '',
			),
			array(
				'name' => 'Trumpet VII',
				'description' => '',
			),
			array(
				'name' => 'Trumpet VIII',
				'description' => '',
			),
			array(
				'name' => 'Tuba VII',
				'description' => '',
			),
			array(
				'name' => 'Tuba VIII',
				'description' => '',
			),
			array(
				'name' => 'Viola VII',
				'description' => '',
			),
			array(
				'name' => 'Viola VIII',
				'description' => '',
			),
			array(
				'name' => 'Violin VII',
				'description' => '',
			),
			array(
				'name' => 'Violin VIII',
				'description' => '',
			),
			array(
				'name' => 'Voice VII',
				'description' => '',
			),
			array(
				'name' => 'Voice VIII',
				'description' => '',
			),
			array(
				'name' => 'Voice for Musical Theatre Majors VII',
				'description' => '',
			),
			array(
				'name' => 'Voice for Musical Theatre Majors VIII',
				'description' => '',
			),
			array(
				'name' => 'Private Composition',
				'description' => '',
			),
			array(
				'name' => 'Private Orchestration',
				'description' => '',
			),
			array(
				'name' => 'Private Jazz Arranging and Composition',
				'description' => '',
			),
			array(
				'name' => 'Private Counterpoint',
				'description' => '',
			),
			array(
				'name' => 'Private Harmony',
				'description' => '',
			),
			array(
				'name' => 'Private Form and Analysis',
				'description' => '',
			),
			array(
				'name' => 'Private Conducting: Choral',
				'description' => '',
			),
			array(
				'name' => 'Private Conducting: Instrumental',
				'description' => '',
			),
			array(
				'name' => 'Private Music History',
				'description' => '',
			),
			array(
				'name' => 'Private Sight-Singing and Ear Training',
				'description' => '',
			),
			array(
				'name' => 'Chamber Chorale',
				'description' => '',
			),
			array(
				'name' => 'Opera Workshop',
				'description' => '',
			),
			array(
				'name' => 'Women\'s Chorus',
				'description' => '',
			),
			array(
				'name' => 'Varsity Men\'s Glee Club',
				'description' => '',
			),
			array(
				'name' => 'Master Chorale',
				'description' => '',
			),
			array(
				'name' => 'Concert Singers',
				'description' => '',
			),
			array(
				'name' => 'Wind Orchestra',
				'description' => '',
			),
			array(
				'name' => 'Marching Band',
				'description' => '',
			),
			array(
				'name' => 'Pep Band',
				'description' => '',
			),
			array(
				'name' => 'Community Concert Band',
				'description' => '',
			),
			array(
				'name' => 'Brass Band',
				'description' => '',
			),
			array(
				'name' => 'Symphonic Winds',
				'description' => '',
			),
			array(
				'name' => 'Symphony Orchestra',
				'description' => '',
			),
			array(
				'name' => 'Chamber Orchestra',
				'description' => '',
			),
			array(
				'name' => 'New Horizons Band',
				'description' => '',
			),
			array(
				'name' => 'Civic Orchestra',
				'description' => '',
			),
			array(
				'name' => 'Jazz Ensemble',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Jazz Combo',
				'description' => '',
			),
			array(
				'name' => 'Jazz Combo',
				'description' => '',
			),
			array(
				'name' => 'Jazz Guitar Ensemble',
				'description' => '',
			),
			array(
				'name' => 'Jazz Vocal Ensemble',
				'description' => '',
			),
			array(
				'name' => 'Contemporary Jazz Ensemble',
				'description' => '',
			),
			array(
				'name' => 'Jazz Latin Ensemble',
				'description' => '',
			),
			array(
				'name' => 'Woodwind Ensemble',
				'description' => '',
			),
			array(
				'name' => 'Flute Ensemble',
				'description' => '',
			),
			array(
				'name' => 'Clarinet Choir',
				'description' => '',
			),
			array(
				'name' => 'Saxophone Ensemble',
				'description' => '',
			),
			array(
				'name' => 'Brass Ensemble',
				'description' => '',
			),
			array(
				'name' => 'String Chamber Ensemble',
				'description' => '',
			),
			array(
				'name' => 'Guitar Ensemble',
				'description' => '',
			),
			array(
				'name' => 'Percussion Ensemble',
				'description' => '',
			),
			array(
				'name' => 'Marimba Band',
				'description' => '',
			),
			array(
				'name' => 'African Ensemble',
				'description' => '',
			),
			array(
				'name' => 'Percussion and Dance',
				'description' => '',
			),
			array(
				'name' => 'Steel Drum Band',
				'description' => '',
			),
			array(
				'name' => 'Hand Drum Ensemble',
				'description' => '',
			),
			array(
				'name' => 'Piano Ensemble',
				'description' => '',
			),
			array(
				'name' => 'Accompanying',
				'description' => '',
			),
			array(
				'name' => 'Piano Sightreading Ensemble',
				'description' => '',
			),
			array(
				'name' => 'Special Ensemble',
				'description' => '',
			),
			array(
				'name' => 'Special Vocal Ensemble',
				'description' => '',
			),
			array(
				'name' => 'Orff Ensemble',
				'description' => '',
			),
			array(
				'name' => 'Opera Production',
				'description' => '',
			),
			array(
				'name' => 'Collegium',
				'description' => '',
			),
			array(
				'name' => 'Chamber Players',
				'description' => '',
			),
			array(
				'name' => 'Environmental Law',
				'description' => '',
			),
			array(
				'name' => 'Soil Science',
				'description' => '',
			),
			array(
				'name' => 'Advanced Environmental Toxicology',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Nuclear Medicine Imaging',
				'description' => '',
			),
			array(
				'name' => 'Nuclear Medicine Instrumentation',
				'description' => '',
			),
			array(
				'name' => 'Radiopharmaceuticals',
				'description' => '',
			),
			array(
				'name' => 'Nuclear Medicine Procedures I',
				'description' => '',
			),
			array(
				'name' => 'Nuclear Medicine Procedures Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Nuclear Cardiology and EGG Interpretation',
				'description' => '',
			),
			array(
				'name' => 'Nuclear Medicine Procedures II',
				'description' => '',
			),
			array(
				'name' => 'Positron Emission Computerized Tomography (PET)',
				'description' => '',
			),
			array(
				'name' => 'Advanced Practice in Nuclear Medicine',
				'description' => '',
			),
			array(
				'name' => 'Exploration in Nursing',
				'description' => '',
			),
			array(
				'name' => 'Fundamentals of Medical Calculations for Health Professions',
				'description' => '',
			),
			array(
				'name' => 'Medical Terminology',
				'description' => '',
			),
			array(
				'name' => 'Basic Nursing Informatics',
				'description' => '',
			),
			array(
				'name' => 'Nutrition and Development Across the Lifespan',
				'description' => '',
			),
			array(
				'name' => 'Patient Centered Care: Basic Principles',
				'description' => '',
			),
			array(
				'name' => 'Foundations in Pharmacology',
				'description' => '',
			),
			array(
				'name' => 'Health Assessment of Diverse Populations',
				'description' => '',
			),
			array(
				'name' => 'Nursing Care of the Adult Medical-Surgical Patient',
				'description' => '',
			),
			array(
				'name' => 'Pharmacology and Pathophysiology Across the Lifespan',
				'description' => '',
			),
			array(
				'name' => 'Professional Communication in Diverse Health Care Settings',
				'description' => '',
			),
			array(
				'name' => 'Physical Assessment Skills',
				'description' => '',
			),
			array(
				'name' => 'Fundamentals of Nursing Lab',
				'description' => '',
			),
			array(
				'name' => 'Population Focused Nursing in the Community',
				'description' => '',
			),
			array(
				'name' => 'Assessment of Medical-Surgical Foundational Knowledge',
				'description' => '',
			),
			array(
				'name' => 'Assessment of Foundational Knowledge in Maternal/Child Nursing and Psychiatric Nursing',
				'description' => '',
			),
			array(
				'name' => 'Nursing Care of Older Adults',
				'description' => '',
			),
			array(
				'name' => 'Nursing Care of Women and Childbearing Families',
				'description' => '',
			),
			array(
				'name' => 'Nursing Care of Childrearing Families',
				'description' => '',
			),
			array(
				'name' => 'Transitions in Nursing',
				'description' => '',
			),
			array(
				'name' => 'Physical Assessment',
				'description' => '',
			),
			array(
				'name' => 'Nursing Practice With Groups and Families',
				'description' => '',
			),
			array(
				'name' => 'Nursing Care of Acutely Ill Populations',
				'description' => '',
			),
			array(
				'name' => 'Care of Individuals and Their Family Experiencing Emotional or Mental Health Disruptions',
				'description' => '',
			),
			array(
				'name' => 'Evidence Based Practice and Research in Nursing',
				'description' => '',
			),
			array(
				'name' => 'IDS: An Interdisciplinary Perspective',
				'description' => '',
			),
			array(
				'name' => 'Population-Focused Care in the Community',
				'description' => '',
			),
			array(
				'name' => 'Managing Complex Nursing Care in Diverse Populations',
				'description' => '',
			),
			array(
				'name' => 'Pathophysiological Processes in Secondary Prevention',
				'description' => '',
			),
			array(
				'name' => 'Nursing Leadership and Transition into Practice',
				'description' => '',
			),
			array(
				'name' => 'Leadership and Management in Nursing Practice',
				'description' => '',
			),
			array(
				'name' => 'Gerontology',
				'description' => '',
			),
			array(
				'name' => 'Special Topics in Nursing',
				'description' => '',
			),
			array(
				'name' => 'Principles of Nutrition',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Nutrition and Dietetics',
				'description' => '',
			),
			array(
				'name' => 'Nutrition, Health and Ethnic Issues',
				'description' => '',
			),
			array(
				'name' => 'Nutrition Assessment',
				'description' => '',
			),
			array(
				'name' => 'Field Experience in Nutrition',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Sports Nutrition',
				'description' => '',
			),
			array(
				'name' => 'Nutrition in the Life Cycle',
				'description' => '',
			),
			array(
				'name' => 'Advanced Sports Nutrition',
				'description' => '',
			),
			array(
				'name' => 'Food Microbiology',
				'description' => '',
			),
			array(
				'name' => 'Complementary and Integrative MNT',
				'description' => '',
			),
			array(
				'name' => 'Nutrition, Food and Policy',
				'description' => '',
			),
			array(
				'name' => 'Medical Nutrition Therapy I',
				'description' => '',
			),
			array(
				'name' => 'Medical Nutrition Therapy II',
				'description' => '',
			),
			array(
				'name' => 'Dietetics Business and Management Principles I',
				'description' => '',
			),
			array(
				'name' => 'Dietetics, Business, and Management Principles II',
				'description' => '',
			),
			array(
				'name' => 'Seminar in Nutrition',
				'description' => '',
			),
			array(
				'name' => 'Food Microbiology Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Medical Nutrition Therapy Practicum',
				'description' => '',
			),
			array(
				'name' => 'Nutritional Pathophysiology',
				'description' => '',
			),
			array(
				'name' => 'Nutrition and Metabolism I',
				'description' => '',
			),
			array(
				'name' => 'Nutrition and Metabolism II',
				'description' => '',
			),
			array(
				'name' => 'Community Nutrition',
				'description' => '',
			),
			array(
				'name' => 'Undergraduate Research in Nutrition',
				'description' => '',
			),
			array(
				'name' => 'Special Topics in Nutrition',
				'description' => '',
			),
			array(
				'name' => 'Independent Study in Clinical Nutrition',
				'description' => '',
			),
			array(
				'name' => 'Practicum in Nutrition Education',
				'description' => '',
			),
			array(
				'name' => 'Personal Health Across the Lifespan',
				'description' => '',
			),
			array(
				'name' => 'Advanced First Aid',
				'description' => '',
			),
			array(
				'name' => 'Multicultural Health',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Epidemiology',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Public Health',
				'description' => '',
			),
			array(
				'name' => 'Principles of Health Promotion',
				'description' => '',
			),
			array(
				'name' => 'History of Public Health',
				'description' => '',
			),
			array(
				'name' => 'Injury Prevention and Control',
				'description' => '',
			),
			array(
				'name' => 'Experential Learning in Public Health',
				'description' => '',
			),
			array(
				'name' => 'Consumer Health',
				'description' => '',
			),
			array(
				'name' => 'Public and Community Health',
				'description' => '',
			),
			array(
				'name' => 'Global Health',
				'description' => '',
			),
			array(
				'name' => 'Built Environment and Health',
				'description' => '',
			),
			array(
				'name' => 'Research Methods for Public Health',
				'description' => '',
			),
			array(
				'name' => 'Stress Management',
				'description' => '',
			),
			array(
				'name' => 'AIDS: An Interdisciplinary Perspective',
				'description' => '',
			),
			array(
				'name' => 'Teaching Elementary School Health',
				'description' => '',
			),
			array(
				'name' => 'Methods in Health Education',
				'description' => '',
			),
			array(
				'name' => 'Education for Sexuality',
				'description' => '',
			),
			array(
				'name' => 'Nutrition',
				'description' => '',
			),
			array(
				'name' => 'Health Studies on Dangerous Drugs',
				'description' => '',
			),
			array(
				'name' => 'Program Planning and Evaluation',
				'description' => '',
			),
			array(
				'name' => 'Food access and health',
				'description' => '',
			),
			array(
				'name' => 'Supervised Teaching-Health Major',
				'description' => '',
			),
			array(
				'name' => 'Supervised Teaching-Health Minor',
				'description' => '',
			),
			array(
				'name' => 'Active Transport, Physical Activity and Health',
				'description' => '',
			),
			array(
				'name' => 'Health Ecology and Sustainability',
				'description' => '',
			),
			array(
				'name' => 'Clinical Teaching Seminar in Health Education',
				'description' => '',
			),
			array(
				'name' => 'Field Experience',
				'description' => '',
			),
			array(
				'name' => 'Field Experience Seminar',
				'description' => '',
			),
			array(
				'name' => 'Workshop in Health Education',
				'description' => '',
			),
			array(
				'name' => 'Public Health Practicum',
				'description' => '',
			),
			array(
				'name' => 'Special Problems in Health Education',
				'description' => '',
			),
			array(
				'name' => 'Senior Thesis in Public Health',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Physical Education',
				'description' => '',
			),
			array(
				'name' => 'Teaching Tumbling',
				'description' => '',
			),
			array(
				'name' => 'Scientific Bases of Physical Education',
				'description' => '',
			),
			array(
				'name' => 'Teaching Team Sports',
				'description' => '',
			),
			array(
				'name' => 'Teaching Fitness Activities',
				'description' => '',
			),
			array(
				'name' => 'Teaching Individual Sports',
				'description' => '',
			),
			array(
				'name' => 'PED Introduction to Coaching',
				'description' => '',
			),
			array(
				'name' => 'Techniques of Coaching Basketball',
				'description' => '',
			),
			array(
				'name' => 'Techniques of Coaching Baseball',
				'description' => '',
			),
			array(
				'name' => 'Techniques of Coaching Football',
				'description' => '',
			),
			array(
				'name' => 'Techniques of Coaching Running Events',
				'description' => '',
			),
			array(
				'name' => 'Techniques of Coaching Field Events',
				'description' => '',
			),
			array(
				'name' => 'Techniques of Coaching Swimming, Diving, and Water Polo',
				'description' => '',
			),
			array(
				'name' => 'Techniques of Coaching Wrestling',
				'description' => '',
			),
			array(
				'name' => 'Techniques of Coaching Volleyball',
				'description' => '',
			),
			array(
				'name' => 'Sports Officiating',
				'description' => '',
			),
			array(
				'name' => 'Motor Development for the Practitioner',
				'description' => '',
			),
			array(
				'name' => 'Coaching Practicum',
				'description' => '',
			),
			array(
				'name' => 'Elementary Physical Education Teaching Practicum',
				'description' => '',
			),
			array(
				'name' => 'Movement Experiences for Children',
				'description' => '',
			),
			array(
				'name' => 'Movement Experiences for Children in Intermediate Grades',
				'description' => '',
			),
			array(
				'name' => 'Teaching Educational Gymnastics',
				'description' => '',
			),
			array(
				'name' => 'Teaching Rhythmic Activities',
				'description' => '',
			),
			array(
				'name' => 'Psychology of Coaching',
				'description' => '',
			),
			array(
				'name' => 'History and Philosophy of Physical Education',
				'description' => '',
			),
			array(
				'name' => 'Conditioning and Training Principles',
				'description' => '',
			),
			array(
				'name' => 'Advanced Principles in Coaching Basketball',
				'description' => '',
			),
			array(
				'name' => 'Advanced Principles of Coaching Football',
				'description' => '',
			),
			array(
				'name' => 'Methods of Teaching Physical Education',
				'description' => '',
			),
			array(
				'name' => 'Sport Communications',
				'description' => '',
			),
			array(
				'name' => 'Secondary Physical Education Teaching Practicum',
				'description' => '',
			),
			array(
				'name' => 'Supervised Teaching in Physical Education (Major field)',
				'description' => '',
			),
			array(
				'name' => 'Supervised Teaching in Physical Education (Minor field)',
				'description' => '',
			),
			array(
				'name' => 'Workshop in Physical Education',
				'description' => '',
			),
			array(
				'name' => 'Methods in Teaching Adapted Physical Education',
				'description' => '',
			),
			array(
				'name' => 'Assessment in Adapted Physical Education',
				'description' => '',
			),
			array(
				'name' => 'Practicum',
				'description' => '',
			),
			array(
				'name' => 'Clinical Teaching Seminar in Physical Education',
				'description' => '',
			),
			array(
				'name' => 'Foundations of Sport Administration',
				'description' => '',
			),
			array(
				'name' => 'Evaluation in Physical Education',
				'description' => '',
			),
			array(
				'name' => 'Advanced Methodology in Coaching Interscholastic and Intercollegiate Athletics',
				'description' => '',
			),
			array(
				'name' => 'Ethical Issues in Sport',
				'description' => '',
			),
			array(
				'name' => 'Coaching Clinic',
				'description' => '',
			),
			array(
				'name' => 'Special Problems in Physical Education',
				'description' => '',
			),
			array(
				'name' => 'Archery',
				'description' => '',
			),
			array(
				'name' => 'Backpacking and Camping',
				'description' => '',
			),
			array(
				'name' => 'Badminton',
				'description' => '',
			),
			array(
				'name' => 'Bicycling',
				'description' => '',
			),
			array(
				'name' => 'Billiards',
				'description' => '',
			),
			array(
				'name' => 'Billiards (Advanced)',
				'description' => '',
			),
			array(
				'name' => 'Bowling',
				'description' => '',
			),
			array(
				'name' => 'Canoeing',
				'description' => '',
			),
			array(
				'name' => 'Golf',
				'description' => '',
			),
			array(
				'name' => 'Golf (Intermediate)',
				'description' => '',
			),
			array(
				'name' => 'Handball',
				'description' => '',
			),
			array(
				'name' => 'Fitness Walking',
				'description' => '',
			),
			array(
				'name' => 'Jogging',
				'description' => '',
			),
			array(
				'name' => 'Olympic Sport Judo',
				'description' => '',
			),
			array(
				'name' => 'Self-Defense Judo',
				'description' => '',
			),
			array(
				'name' => 'Tae Kwon Do (Beginning)',
				'description' => '',
			),
			array(
				'name' => 'Tae Kwon Do (Intermediate)',
				'description' => '',
			),
			array(
				'name' => 'Self Defense',
				'description' => '',
			),
			array(
				'name' => 'Aikido (Beginning)',
				'description' => '',
			),
			array(
				'name' => 'Aikido (Intermediate)',
				'description' => '',
			),
			array(
				'name' => 'Scuba Diving',
				'description' => '',
			),
			array(
				'name' => 'Scuba Diving (Advanced)',
				'description' => '',
			),
			array(
				'name' => 'Okinawan Karate',
				'description' => '',
			),
			array(
				'name' => 'Skiing',
				'description' => '',
			),
			array(
				'name' => 'Skiing (Advanced)',
				'description' => '',
			),
			array(
				'name' => 'Shotokan Karate',
				'description' => '',
			),
			array(
				'name' => 'Swimming (Beginning)',
				'description' => '',
			),
			array(
				'name' => 'Swimming (Intermediate)',
				'description' => '',
			),
			array(
				'name' => 'Advanced Swimming and Lifesaving',
				'description' => '',
			),
			array(
				'name' => 'Swim Instructor Training (WSI)',
				'description' => '',
			),
			array(
				'name' => 'Lifeguard Training',
				'description' => '',
			),
			array(
				'name' => 'Synchronized Swimming',
				'description' => '',
			),
			array(
				'name' => 'Tennis',
				'description' => '',
			),
			array(
				'name' => 'Tennis (Intermediate/Advanced)',
				'description' => '',
			),
			array(
				'name' => 'Racquetball',
				'description' => '',
			),
			array(
				'name' => 'Racquetball (Intermediate)',
				'description' => '',
			),
			array(
				'name' => 'Racquetball (Advanced)',
				'description' => '',
			),
			array(
				'name' => 'Table Tennis (Beginning)',
				'description' => '',
			),
			array(
				'name' => 'Table Tennis (Advanced)',
				'description' => '',
			),
			array(
				'name' => 'Desert Hiking and Survival Skills',
				'description' => '',
			),
			array(
				'name' => 'Water Aerobics',
				'description' => '',
			),
			array(
				'name' => 'Low Back Care Through Gentle Yoga',
				'description' => '',
			),
			array(
				'name' => 'Circuit Training',
				'description' => '',
			),
			array(
				'name' => 'Step Aerobics',
				'description' => '',
			),
			array(
				'name' => 'Weight Training',
				'description' => '',
			),
			array(
				'name' => 'Aqua-Dynamics',
				'description' => '',
			),
			array(
				'name' => 'T\'ai Chi Cu\'uan',
				'description' => '',
			),
			array(
				'name' => 'T\'ai Chi Ch\'uan (Intermediate)',
				'description' => '',
			),
			array(
				'name' => 'Hatha Yoga',
				'description' => '',
			),
			array(
				'name' => 'Hatha Yoga (Intermediate)',
				'description' => '',
			),
			array(
				'name' => 'Martial Arts Cross Training',
				'description' => '',
			),
			array(
				'name' => 'Cardio-Kickboxing',
				'description' => '',
			),
			array(
				'name' => 'Ice Skating Skills (Beginning)',
				'description' => '',
			),
			array(
				'name' => 'Ice Skating Skills (Intermediate)',
				'description' => '',
			),
			array(
				'name' => 'Ice Hockey Skills (Beginning)',
				'description' => '',
			),
			array(
				'name' => 'Rock Climbing',
				'description' => '',
			),
			array(
				'name' => 'Rock Climbing (Intermediate)',
				'description' => '',
			),
			array(
				'name' => 'Softball',
				'description' => '',
			),
			array(
				'name' => 'Soccer',
				'description' => '',
			),
			array(
				'name' => 'Volleyball',
				'description' => '',
			),
			array(
				'name' => 'PEX Volleyball (Advanced)',
				'description' => '',
			),
			array(
				'name' => 'Total Body Conditioning for Women',
				'description' => '',
			),
			array(
				'name' => 'Weight Training for Women',
				'description' => '',
			),
			array(
				'name' => 'Indoor Cycling',
				'description' => '',
			),
			array(
				'name' => 'Basketball',
				'description' => '',
			),
			array(
				'name' => 'Body Weight Bootcamp',
				'description' => '',
			),
			array(
				'name' => 'Dance Conditioning',
				'description' => '',
			),
			array(
				'name' => 'Flag Football',
				'description' => '',
			),
			array(
				'name' => 'Floor Hockey',
				'description' => '',
			),
			array(
				'name' => 'Latin Nightclub Dance',
				'description' => '',
			),
			array(
				'name' => 'Pilates',
				'description' => '',
			),
			array(
				'name' => 'Triathlong Training',
				'description' => '',
			),
			array(
				'name' => 'Body Building and Contouring',
				'description' => '',
			),
			array(
				'name' => 'Body Building and Contouring (Advanced)',
				'description' => '',
			),
			array(
				'name' => 'Aerobic Conditioning',
				'description' => '',
			),
			array(
				'name' => 'Calisthenics and Floor Exercise',
				'description' => '',
			),
			array(
				'name' => 'Ultimate Frisbee',
				'description' => '',
			),
			array(
				'name' => 'Adult Fitness-Principles and Practices',
				'description' => '',
			),
			array(
				'name' => 'Back Country Camping and Travel',
				'description' => '',
			),
			array(
				'name' => 'Winter Camping and Travel',
				'description' => '',
			),
			array(
				'name' => 'Boxing Aerobic Conditioning',
				'description' => '',
			),
			array(
				'name' => 'Team Handball',
				'description' => '',
			),
			array(
				'name' => 'Fencing',
				'description' => '',
			),
			array(
				'name' => 'Fencing, (Intermediate/Advanced)',
				'description' => '',
			),
			array(
				'name' => 'Specific Topics in Physical Education',
				'description' => '',
			),
			array(
				'name' => 'Fundamentals of Coaching',
				'description' => '',
			),
			array(
				'name' => 'Golf for Business and Life',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Player Development',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Golf Operations',
				'description' => '',
			),
			array(
				'name' => 'Golf Operations II',
				'description' => '',
			),
			array(
				'name' => 'PGM Internship I',
				'description' => '',
			),
			array(
				'name' => 'PGA PGM Level 1',
				'description' => '',
			),
			array(
				'name' => 'PGA PGM Level 2',
				'description' => '',
			),
			array(
				'name' => 'PGM Internship II',
				'description' => '',
			),
			array(
				'name' => 'PGA PGM Level 2 continued',
				'description' => '',
			),
			array(
				'name' => 'PGA PGM Level 3',
				'description' => '',
			),
			array(
				'name' => 'PGA/PGMTM level 2',
				'description' => '',
			),
			array(
				'name' => 'PGM Internship III',
				'description' => '',
			),
			array(
				'name' => 'PGA PGM Level 3 continued',
				'description' => '',
			),
			array(
				'name' => 'PGA/PGMTM level 3',
				'description' => '',
			),
			array(
				'name' => 'PGM Internship IV',
				'description' => '',
			),
			array(
				'name' => 'A-E Professional Golf Management Internship I-V',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Philosophy',
				'description' => '',
			),
			array(
				'name' => 'Critical Thinking and Reasoning',
				'description' => '',
			),
			array(
				'name' => 'Evidence and Inductive Reasoning',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Symbolic Logic',
				'description' => '',
			),
			array(
				'name' => 'Philosophy of Death and Dying',
				'description' => '',
			),
			array(
				'name' => 'Indian Philosophy of Mind and Mental Health',
				'description' => '',
			),
			array(
				'name' => 'Philosophical Traditions of Asia',
				'description' => '',
			),
			array(
				'name' => 'Topics in Philosophy or Religion',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Ethics',
				'description' => '',
			),
			array(
				'name' => 'Existentialism',
				'description' => '',
			),
			array(
				'name' => 'Science and Religion',
				'description' => '',
			),
			array(
				'name' => 'World Religions',
				'description' => '',
			),
			array(
				'name' => 'Introduction to the Study of Marxism',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Indian Philosophy',
				'description' => '',
			),
			array(
				'name' => 'Ethics For Engineers and Scientists',
				'description' => '',
			),
			array(
				'name' => 'Contemporary Moral Issues',
				'description' => '',
			),
			array(
				'name' => 'Philosophy and Women',
				'description' => '',
			),
			array(
				'name' => 'Environmental Ethics',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Critical Thinking and Reasoning',
				'description' => '',
			),
			array(
				'name' => 'Great Philosophers',
				'description' => '',
			),
			array(
				'name' => 'Professional Ethics',
				'description' => '',
			),
			array(
				'name' => 'Philosophy of Law',
				'description' => '',
			),
			array(
				'name' => 'Inductive Logic and Probability',
				'description' => '',
			),
			array(
				'name' => 'Computers and Culture',
				'description' => '',
			),
			array(
				'name' => 'Phenomenology',
				'description' => '',
			),
			array(
				'name' => 'Health Care Ethics',
				'description' => '',
			),
			array(
				'name' => 'Theories of Culture',
				'description' => '',
			),
			array(
				'name' => 'Ancient Philosophy',
				'description' => '',
			),
			array(
				'name' => 'Medieval Philosophy',
				'description' => '',
			),
			array(
				'name' => 'Early Modern Philosophy',
				'description' => '',
			),
			array(
				'name' => 'Nineteenth-Century Philosophy',
				'description' => '',
			),
			array(
				'name' => 'Contemporary Philosophy',
				'description' => '',
			),
			array(
				'name' => 'American Philosophy',
				'description' => '',
			),
			array(
				'name' => 'Plato',
				'description' => '',
			),
			array(
				'name' => 'Aristotle',
				'description' => '',
			),
			array(
				'name' => 'Kant',
				'description' => '',
			),
			array(
				'name' => 'Logical Theory',
				'description' => '',
			),
			array(
				'name' => 'Advanced Logic',
				'description' => '',
			),
			array(
				'name' => 'Philosophy of Language',
				'description' => '',
			),
			array(
				'name' => 'Philosophy of Science',
				'description' => '',
			),
			array(
				'name' => 'History of Scientific Thought',
				'description' => '',
			),
			array(
				'name' => 'Philosophy of the Social Sciences',
				'description' => '',
			),
			array(
				'name' => 'Philosophical Psychology',
				'description' => '',
			),
			array(
				'name' => 'Philosophy of Cognitive Science',
				'description' => '',
			),
			array(
				'name' => 'Philosophy of Mind',
				'description' => '',
			),
			array(
				'name' => 'Theory of Knowledge',
				'description' => '',
			),
			array(
				'name' => 'Metaphysics',
				'description' => '',
			),
			array(
				'name' => 'Social and Political Philosophy',
				'description' => '',
			),
			array(
				'name' => 'Ethical Theory',
				'description' => '',
			),
			array(
				'name' => 'Aesthetics',
				'description' => '',
			),
			array(
				'name' => 'Philosophy of Religion',
				'description' => '',
			),
			array(
				'name' => 'Indian Philosophy',
				'description' => '',
			),
			array(
				'name' => 'Chinese and Japanese Philosophy',
				'description' => '',
			),
			array(
				'name' => 'Gandhian Welfare Philosophy and Culture',
				'description' => '',
			),
			array(
				'name' => 'Selected Topics in Religion',
				'description' => '',
			),
			array(
				'name' => 'Volleyball (Advanced)',
				'description' => '',
			),
			array(
				'name' => 'PSC Political Systems of West Europe',
				'description' => '',
			),
			array(
				'name' => 'Political Systems of East Asia',
				'description' => '',
			),
			array(
				'name' => 'Political Systems of Russia and East-Central Europe',
				'description' => '',
			),
			array(
				'name' => 'Political Systems of the Middle East and North Africa',
				'description' => '',
			),
			array(
				'name' => 'Politics in Latin America',
				'description' => '',
			),
			array(
				'name' => 'Communist Political Systems',
				'description' => '',
			),
			array(
				'name' => 'Politics and Problems in Developing Areas',
				'description' => '',
			),
			array(
				'name' => 'Comparative Religion and Politics',
				'description' => '',
			),
			array(
				'name' => 'Islamic Politics',
				'description' => '',
			),
			array(
				'name' => 'Political Violence and Terrorism',
				'description' => '',
			),
			array(
				'name' => 'The Politics of Sub-Saharan Africa',
				'description' => '',
			),
			array(
				'name' => 'Democratization',
				'description' => '',
			),
			array(
				'name' => 'Politics Of Catholicism',
				'description' => '',
			),
			array(
				'name' => 'Special Topics in Comparative Politics',
				'description' => '',
			),
			array(
				'name' => 'American Political Thought',
				'description' => '',
			),
			array(
				'name' => 'Political Theory and Political Education',
				'description' => '',
			),
			array(
				'name' => 'Politics and Literature',
				'description' => '',
			),
			array(
				'name' => 'The Problem of Socrates',
				'description' => '',
			),
			array(
				'name' => 'Marx and Marxism',
				'description' => '',
			),
			array(
				'name' => 'Feminist Political Theory',
				'description' => '',
			),
			array(
				'name' => 'Medieval Political Theory',
				'description' => '',
			),
			array(
				'name' => 'Special Topics in Political Theory',
				'description' => '',
			),
			array(
				'name' => 'Constitutional Law: The First Amendment',
				'description' => '',
			),
			array(
				'name' => 'Constitutional Law: Civil Rights',
				'description' => '',
			),
			array(
				'name' => 'Legal Theory',
				'description' => '',
			),
			array(
				'name' => 'Constitutional Rights of Women',
				'description' => '',
			),
			array(
				'name' => 'Constitutional Rights of the Accused',
				'description' => '',
			),
			array(
				'name' => 'Constitutional Theory',
				'description' => '',
			),
			array(
				'name' => 'Comparative Law',
				'description' => '',
			),
			array(
				'name' => 'Supreme Court and Capitalism',
				'description' => '',
			),
			array(
				'name' => 'Special Topics in Public Law',
				'description' => '',
			),
			array(
				'name' => 'Independent Study and Research in Political Science',
				'description' => '',
			),
			array(
				'name' => 'Internship: Administrative',
				'description' => '',
			),
			array(
				'name' => 'Internship: Legislative',
				'description' => '',
			),
			array(
				'name' => 'Internship: Campaign',
				'description' => '',
			),
			array(
				'name' => 'Internship: Legal',
				'description' => '',
			),
			array(
				'name' => 'Internship: Political News Broadcast',
				'description' => '',
			),
			array(
				'name' => 'General Psychology',
				'description' => '',
			),
			array(
				'name' => 'Psychology of Personal and Social Adjustment',
				'description' => '',
			),
			array(
				'name' => 'Introduction to the Psychology Major',
				'description' => '',
			),
			array(
				'name' => 'Development Across the Lifespan',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Statistical Methods',
				'description' => '',
			),
			array(
				'name' => 'Research Methods',
				'description' => '',
			),
			array(
				'name' => 'Chicano/Latino Psychology',
				'description' => '',
			),
			array(
				'name' => 'African American Psychology',
				'description' => '',
			),
			array(
				'name' => 'Foundations of Physiological Psychology',
				'description' => '',
			),
			array(
				'name' => 'Foundations of Perception',
				'description' => '',
			),
			array(
				'name' => 'Foundations of Cognitive Psychology',
				'description' => '',
			),
			array(
				'name' => 'Foundations of Developmental Psychology: Infant & Child',
				'description' => '',
			),
			array(
				'name' => 'Foundations of Abnormal Psychology',
				'description' => '',
			),
			array(
				'name' => 'Foundations of Social Psychology',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Statistics',
				'description' => '',
			),
			array(
				'name' => 'History of Psychology',
				'description' => '',
			),
			array(
				'name' => 'Motivation and Emotion',
				'description' => '',
			),
			array(
				'name' => 'Principles of Animal Behavior',
				'description' => '',
			),
			array(
				'name' => 'Psycholinguistics',
				'description' => '',
			),
			array(
				'name' => 'Applied Cognition',
				'description' => '',
			),
			array(
				'name' => 'Psychology of Learning',
				'description' => '',
			),
			array(
				'name' => 'Behavior Modification',
				'description' => '',
			),
			array(
				'name' => 'Psychopharmacology of Abused Drugs',
				'description' => '',
			),
			array(
				'name' => 'Human Memory',
				'description' => '',
			),
			array(
				'name' => 'Culture and Personality',
				'description' => '',
			),
			array(
				'name' => 'Developmental Psychology: Adolescence and Adulthood',
				'description' => '',
			),
			array(
				'name' => 'Personality',
				'description' => '',
			),
			array(
				'name' => 'Humanistic Psychology',
				'description' => '',
			),
			array(
				'name' => 'Childhood Behavior Disorders',
				'description' => '',
			),
			array(
				'name' => 'Psychology of Aging',
				'description' => '',
			),
			array(
				'name' => 'Industrial and Organizational Psychology',
				'description' => '',
			),
			array(
				'name' => 'Basic Principles of Psychotherapy',
				'description' => '',
			),
			array(
				'name' => 'Group Process and Personal Growth',
				'description' => '',
			),
			array(
				'name' => 'Small Group Behavior',
				'description' => '',
			),
			array(
				'name' => 'Psychology of Sex',
				'description' => '',
			),
			array(
				'name' => 'Psychology of Gender',
				'description' => '',
			),
			array(
				'name' => 'Health Psychology',
				'description' => '',
			),
			array(
				'name' => 'Principles of Psychological Assessment',
				'description' => '',
			),
			array(
				'name' => 'Advanced Independent Study',
				'description' => '',
			),
			array(
				'name' => 'Supervised Field Experience',
				'description' => '',
			),
			array(
				'name' => 'Advanced Independent Research',
				'description' => '',
			),
			array(
				'name' => 'Advanced Special Topics',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Leadership Experience',
				'description' => '',
			),
			array(
				'name' => 'Leadership Experience',
				'description' => '',
			),
			array(
				'name' => 'Survey of Public Administration',
				'description' => '',
			),
			array(
				'name' => 'Local Government Administration',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Policy Analysis',
				'description' => '',
			),
			array(
				'name' => 'Global Leadership',
				'description' => '',
			),
			array(
				'name' => 'Leadership as Social Change',
				'description' => '',
			),
			array(
				'name' => 'Conflict and the Role of Leadership',
				'description' => '',
			),
			array(
				'name' => 'Leadership, Facilitation, and Training',
				'description' => '',
			),
			array(
				'name' => 'Leadership Capstone Experience',
				'description' => '',
			),
			array(
				'name' => 'Leadership Internship',
				'description' => '',
			),
			array(
				'name' => 'Risk Management in the Public and Nonprofit Sectors',
				'description' => '',
			),
			array(
				'name' => 'Risk Assessment and Risk Management',
				'description' => '',
			),
			array(
				'name' => 'Public Organizations',
				'description' => '',
			),
			array(
				'name' => 'Research Methods for Public Administration',
				'description' => '',
			),
			array(
				'name' => 'Public Personnel Administration',
				'description' => '',
			),
			array(
				'name' => 'Computer Technology in Government',
				'description' => '',
			),
			array(
				'name' => 'Leadership of Public Bureaucracies',
				'description' => '',
			),
			array(
				'name' => 'Ethics in Public Administration',
				'description' => '',
			),
			array(
				'name' => 'Fraud, Waste, and Abuse in Public and Nonprofit Organizations',
				'description' => '',
			),
			array(
				'name' => 'Public Budgeting and Finance',
				'description' => '',
			),
			array(
				'name' => 'Intergovernmental Relations',
				'description' => '',
			),
			array(
				'name' => 'Policy for Public Administrators',
				'description' => '',
			),
			array(
				'name' => 'Seminar in Public Administration',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Medical Imaging',
				'description' => '',
			),
			array(
				'name' => 'Patient Care in Medical Imaging and Radiation Therapy',
				'description' => '',
			),
			array(
				'name' => 'Radiography Clinical Education I',
				'description' => '',
			),
			array(
				'name' => 'Radiography Clinical Education II',
				'description' => '',
			),
			array(
				'name' => 'Radiography Clinical Education III',
				'description' => '',
			),
			array(
				'name' => 'Radiography Clinical Education IV',
				'description' => '',
			),
			array(
				'name' => 'Radiography Clinical Education V',
				'description' => '',
			),
			array(
				'name' => 'Physics of X-Ray Production',
				'description' => '',
			),
			array(
				'name' => 'Physics of X-Ray Production Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Radiographic Quality Assurance and Techniques',
				'description' => '',
			),
			array(
				'name' => 'Radiographic Procedures I',
				'description' => '',
			),
			array(
				'name' => 'Radiographic Procedures Skill Laboratory I',
				'description' => '',
			),
			array(
				'name' => 'Radiographic Procedures II',
				'description' => '',
			),
			array(
				'name' => 'Radiographic Procedures Skills Laboratory II',
				'description' => '',
			),
			array(
				'name' => 'Radiographic and Special Imaging Pathology',
				'description' => '',
			),
			array(
				'name' => 'Principles of Advanced Imaging',
				'description' => '',
			),
			array(
				'name' => 'Principles of Digital Imaging',
				'description' => '',
			),
			array(
				'name' => 'Ethics and Medical Law in Radiology',
				'description' => '',
			),
			array(
				'name' => 'Independent Study in Radiography',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Real Estate',
				'description' => '',
			),
			array(
				'name' => 'Real Estate Finance',
				'description' => '',
			),
			array(
				'name' => 'Real Estate Valuation',
				'description' => '',
			),
			array(
				'name' => 'Real Estate Investment',
				'description' => '',
			),
			array(
				'name' => 'Real Estate Development',
				'description' => '',
			),
			array(
				'name' => 'Real Estate Development II',
				'description' => '',
			),
			array(
				'name' => 'Real Estate Internship',
				'description' => '',
			),
			array(
				'name' => 'Real Estate Independent Study',
				'description' => '',
			),
			array(
				'name' => 'Current Topics in Real Estate',
				'description' => '',
			),
			array(
				'name' => 'Introduction to the University for Science Majors',
				'description' => '',
			),
			array(
				'name' => 'A Preview of Dentistry',
				'description' => '',
			),
			array(
				'name' => 'Standardized Test Lab',
				'description' => '',
			),
			array(
				'name' => 'Training in Science Leadership',
				'description' => '',
			),
			array(
				'name' => 'Operations Management',
				'description' => '',
			),
			array(
				'name' => 'Supply Chain Management',
				'description' => '',
			),
			array(
				'name' => 'Purchasing and Global Sourcing',
				'description' => '',
			),
			array(
				'name' => 'Process Management, Planning, and Control',
				'description' => '',
			),
			array(
				'name' => 'Logistics and Supply Chain Integration',
				'description' => '',
			),
			array(
				'name' => 'Seminar in Supply Chain Management',
				'description' => '',
			),
			array(
				'name' => 'Athletic Training',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Athletic Training Clinical',
				'description' => '',
			),
			array(
				'name' => 'Management of Sport Trauma and Illness',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Physical Therapy',
				'description' => '',
			),
			array(
				'name' => 'Exercise and Sport Injury',
				'description' => '',
			),
			array(
				'name' => 'Clinical Experiences in Athletic Training I',
				'description' => '',
			),
			array(
				'name' => 'Clinical Experiences in Athletic Training II',
				'description' => '',
			),
			array(
				'name' => 'Assessment and Evaluation of Lower Extremity Injuries',
				'description' => '',
			),
			array(
				'name' => 'Assessment and Evaluation of Upper Extremity Injuries',
				'description' => '',
			),
			array(
				'name' => 'Therapeutic Modalities',
				'description' => '',
			),
			array(
				'name' => 'Seminar in Sports Injury Management',
				'description' => '',
			),
			array(
				'name' => 'Organization and Administration of Athletic Training Programs',
				'description' => '',
			),
			array(
				'name' => 'Advanced Clinical Experiences in Athletic Training I',
				'description' => '',
			),
			array(
				'name' => 'Advanced Clinical Experiences in Athletic Training II',
				'description' => '',
			),
			array(
				'name' => 'Therapeutic Exercise',
				'description' => '',
			),
			array(
				'name' => 'Advanced Athletic Training',
				'description' => '',
			),
			array(
				'name' => 'Sports Medicine',
				'description' => '',
			),
			array(
				'name' => 'Field Experiences in Athletic Training',
				'description' => '',
			),
			array(
				'name' => 'Seminar in Athletic Training',
				'description' => '',
			),
			array(
				'name' => 'Special Problems in Athletic Training',
				'description' => '',
			),
			array(
				'name' => 'Principles of Sociology',
				'description' => '',
			),
			array(
				'name' => 'Contemporary Social Issues',
				'description' => '',
			),
			array(
				'name' => 'Ethnic Groups in Contemporary Societies',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Research Methods',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Social Psychology',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Marriage and Family',
				'description' => '',
			),
			array(
				'name' => 'Aging in Modern American Society',
				'description' => '',
			),
			array(
				'name' => 'Field Work in Sociology',
				'description' => '',
			),
			array(
				'name' => 'Sociology of Subcultures',
				'description' => '',
			),
			array(
				'name' => 'Internship in Sociology',
				'description' => '',
			),
			array(
				'name' => 'Colloquium',
				'description' => '',
			),
			array(
				'name' => 'Senior Thesis in Cultural Studies',
				'description' => '',
			),
			array(
				'name' => 'Sociology and Literature',
				'description' => '',
			),
			array(
				'name' => 'Techniques of Social Research',
				'description' => '',
			),
			array(
				'name' => 'Statistical Methods in the Social Sciences',
				'description' => '',
			),
			array(
				'name' => 'Qualitative Research',
				'description' => '',
			),
			array(
				'name' => 'Sociology of Aging',
				'description' => '',
			),
			array(
				'name' => 'Films and Society',
				'description' => '',
			),
			array(
				'name' => 'Sociology of Art',
				'description' => '',
			),
			array(
				'name' => 'Sociology of Sport',
				'description' => '',
			),
			array(
				'name' => 'Popular Culture',
				'description' => '',
			),
			array(
				'name' => 'World Population Problems',
				'description' => '',
			),
			array(
				'name' => 'Sociology of Work and Occupations',
				'description' => '',
			),
			array(
				'name' => 'Sociology of Leisure',
				'description' => '',
			),
			array(
				'name' => 'Television and Society',
				'description' => '',
			),
			array(
				'name' => 'Classical Social Theory',
				'description' => '',
			),
			array(
				'name' => 'Modern Sociological Theory',
				'description' => '',
			),
			array(
				'name' => 'Comparative Racial and Ethnic Relations',
				'description' => '',
			),
			array(
				'name' => 'Special Topics in Comparative Societies',
				'description' => '',
			),
			array(
				'name' => 'Globalization: Economic, Political, and Cultural Perspectives',
				'description' => '',
			),
			array(
				'name' => 'Crime and Criminal Behavior',
				'description' => '',
			),
			array(
				'name' => 'Juvenile Delinquency',
				'description' => '',
			),
			array(
				'name' => 'Penology & Social Control',
				'description' => '',
			),
			array(
				'name' => 'Social Inequality',
				'description' => '',
			),
			array(
				'name' => 'Urban Sociology',
				'description' => '',
			),
			array(
				'name' => 'Sociology of Occupations and Professions',
				'description' => '',
			),
			array(
				'name' => 'Men in Society',
				'description' => '',
			),
			array(
				'name' => 'Bureaucracy in Society',
				'description' => '',
			),
			array(
				'name' => 'Marriage and the Family',
				'description' => '',
			),
			array(
				'name' => 'Sex and Social Arrangements',
				'description' => '',
			),
			array(
				'name' => 'Russian Society in Transition',
				'description' => '',
			),
			array(
				'name' => 'Sociology of Youth Cultures',
				'description' => '',
			),
			array(
				'name' => 'Gender and Society',
				'description' => '',
			),
			array(
				'name' => 'Social Movements and Social Change',
				'description' => '',
			),
			array(
				'name' => 'Life, Death, and Sex: Social Demography',
				'description' => '',
			),
			array(
				'name' => 'Critical Sociology',
				'description' => '',
			),
			array(
				'name' => 'Self and Society',
				'description' => '',
			),
			array(
				'name' => 'Mass Communications',
				'description' => '',
			),
			array(
				'name' => 'Collective Behavior',
				'description' => '',
			),
			array(
				'name' => 'Sociology of Medicine',
				'description' => '',
			),
			array(
				'name' => 'Sociology of Science',
				'description' => '',
			),
			array(
				'name' => 'Crossing Borders/Global Migrations',
				'description' => '',
			),
			array(
				'name' => 'Sociology of Deviance',
				'description' => '',
			),
			array(
				'name' => 'Race and Ethnic Relations in America',
				'description' => '',
			),
			array(
				'name' => 'Latina/Latinos in America',
				'description' => '',
			),
			array(
				'name' => 'Sociology of Mental Disorders',
				'description' => '',
			),
			array(
				'name' => 'Sociology of Religion',
				'description' => '',
			),
			array(
				'name' => 'Political Sociology',
				'description' => '',
			),
			array(
				'name' => 'Sociology of Education',
				'description' => '',
			),
			array(
				'name' => 'Women and Society',
				'description' => '',
			),
			array(
				'name' => 'Sociology of Substance Use, Abuse, and Addiction',
				'description' => '',
			),
			array(
				'name' => 'Aging and Social Policy',
				'description' => '',
			),
			array(
				'name' => 'Sociology of Death and Dying',
				'description' => '',
			),
			array(
				'name' => 'Architectural Sociology',
				'description' => '',
			),
			array(
				'name' => 'Capstone in Sociology',
				'description' => '',
			),
			array(
				'name' => 'Special Topics in Sociology',
				'description' => '',
			),
			array(
				'name' => 'Independent Study in Cultural Studies',
				'description' => '',
			),
			array(
				'name' => 'Elementary Spanish I',
				'description' => '',
			),
			array(
				'name' => 'Elementary Spanish II',
				'description' => '',
			),
			array(
				'name' => 'Intensive Spanish',
				'description' => '',
			),
			array(
				'name' => 'Reading Proficiency in Spanish for Graduate Students',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Spanish I',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Spanish II',
				'description' => '',
			),
			array(
				'name' => 'Spanish for Heritage Speakers I',
				'description' => '',
			),
			array(
				'name' => 'Spanish for Heritage Speakers II',
				'description' => '',
			),
			array(
				'name' => 'Third-Year Spanish: Conversation and Composition',
				'description' => '',
			),
			array(
				'name' => 'Third-Year Spanish: Grammar and Composition',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Hispanic Linguistics',
				'description' => '',
			),
			array(
				'name' => 'Spanish Phonetics and Phonology',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Translation',
				'description' => '',
			),
			array(
				'name' => 'Interpretation I',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Spanish Literature I',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Spanish Literature II',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Spanish American Literature I',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Spanish American Literature II',
				'description' => '',
			),
			array(
				'name' => 'Topics in Hispanic Literature',
				'description' => '',
			),
			array(
				'name' => 'Business Spanish I',
				'description' => '',
			),
			array(
				'name' => 'Business Spanish II',
				'description' => '',
			),
			array(
				'name' => 'Spanish for the Social Services',
				'description' => '',
			),
			array(
				'name' => 'Spanish for the Tourism Industry',
				'description' => '',
			),
			array(
				'name' => 'Spanish for the Legal Profession',
				'description' => '',
			),
			array(
				'name' => 'Spanish for the Medical Profession',
				'description' => '',
			),
			array(
				'name' => 'Reading Proficiency in Spanish',
				'description' => '',
			),
			array(
				'name' => 'Advanced Reading and Writing Techniques in Spanish',
				'description' => '',
			),
			array(
				'name' => 'Topics in Hispanic Linguistics',
				'description' => '',
			),
			array(
				'name' => 'Advanced Translation',
				'description' => '',
			),
			array(
				'name' => 'Interpretation II',
				'description' => '',
			),
			array(
				'name' => 'Topics in Hispanic Culture',
				'description' => '',
			),
			array(
				'name' => 'Advanced Topics in Hispanic Literature',
				'description' => '',
			),
			array(
				'name' => 'Spanish Dialectology',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Statistics',
				'description' => '',
			),
			array(
				'name' => 'Applied Statistics for Biological Sciences',
				'description' => '',
			),
			array(
				'name' => 'Statistical Methods I',
				'description' => '',
			),
			array(
				'name' => 'Statistical Methods II',
				'description' => '',
			),
			array(
				'name' => 'Statistical Experimental Design',
				'description' => '',
			),
			array(
				'name' => 'Applied Statistics for Engineers',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Mathematical Statistics',
				'description' => '',
			),
			array(
				'name' => 'Environmental Statistics I: Univariate Methods',
				'description' => '',
			),
			array(
				'name' => 'Senior Research Project in Statistics',
				'description' => '',
			),
			array(
				'name' => 'Advanced Statistics Topics',
				'description' => '',
			),
			array(
				'name' => 'Statistics for Scientists I',
				'description' => '',
			),
			array(
				'name' => 'Statistics for Scientists II',
				'description' => '',
			),
			array(
				'name' => 'Applied Regression Analysis',
				'description' => '',
			),
			array(
				'name' => 'Nonparametric Statistics',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Social Work',
				'description' => '',
			),
			array(
				'name' => 'Perspectives in Aging',
				'description' => '',
			),
			array(
				'name' => 'Human Behavior and the Social Environment I',
				'description' => '',
			),
			array(
				'name' => 'Social Welfare Policy',
				'description' => '',
			),
			array(
				'name' => 'The Effects of War on Individuals and Communities',
				'description' => '',
			),
			array(
				'name' => 'Social Work Methods I',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Professional Practice',
				'description' => '',
			),
			array(
				'name' => 'Social Work Research I',
				'description' => '',
			),
			array(
				'name' => 'Information and Referral',
				'description' => '',
			),
			array(
				'name' => 'Interviewing Techniques',
				'description' => '',
			),
			array(
				'name' => 'Field Practicum I',
				'description' => '',
			),
			array(
				'name' => 'Social Work Practice I',
				'description' => '',
			),
			array(
				'name' => 'Social Work Practice II',
				'description' => '',
			),
			array(
				'name' => 'Human Behavior and the Social Environment II',
				'description' => '',
			),
			array(
				'name' => 'Social Work Research II',
				'description' => '',
			),
			array(
				'name' => 'Field Practicum II',
				'description' => '',
			),
			array(
				'name' => 'Social Work with the Elderly',
				'description' => '',
			),
			array(
				'name' => 'Basic Concepts in Social Work Administration',
				'description' => '',
			),
			array(
				'name' => 'Seminar: Contemporary Issues in Social Welfare',
				'description' => '',
			),
			array(
				'name' => 'Child Welfare Issues',
				'description' => '',
			),
			array(
				'name' => 'Community Organization Practice',
				'description' => '',
			),
			array(
				'name' => 'Advanced Seminar: Special Problems',
				'description' => '',
			),
			array(
				'name' => 'Principles of Family Practice',
				'description' => '',
			),
			array(
				'name' => 'Transitions: Women and Men in the Middle Years',
				'description' => '',
			),
			array(
				'name' => 'Grant Writing and Management',
				'description' => '',
			),
			array(
				'name' => 'Global Child Welfare',
				'description' => '',
			),
			array(
				'name' => 'Gandhian Welfare Philosophy and Nonviolent Culture',
				'description' => '',
			),
			array(
				'name' => 'Eastern Conceptions and Social Work Practice',
				'description' => '',
			),
			array(
				'name' => 'Capstone Seminar',
				'description' => '',
			),
			array(
				'name' => 'Hospitality Academic and Personal Development',
				'description' => '',
			),
			array(
				'name' => 'Introduction to the Convention Industry',
				'description' => '',
			),
			array(
				'name' => 'Travel and Tourism I',
				'description' => '',
			),
			array(
				'name' => 'Hospitality Career Development',
				'description' => '',
			),
			array(
				'name' => 'Hospitality Accounting I',
				'description' => '',
			),
			array(
				'name' => 'Travel and Tourism II',
				'description' => '',
			),
			array(
				'name' => 'Travel Agency Operations',
				'description' => '',
			),
			array(
				'name' => 'Destination Management Company Administration',
				'description' => '',
			),
			array(
				'name' => 'Hospitality Accounting II',
				'description' => '',
			),
			array(
				'name' => 'World Culture and Hospitality Management',
				'description' => '',
			),
			array(
				'name' => 'Asian Travel and Tourism Development',
				'description' => '',
			),
			array(
				'name' => 'The Recreation Industry',
				'description' => '',
			),
			array(
				'name' => 'Media in Entertainment',
				'description' => '',
			),
			array(
				'name' => 'The National Parks',
				'description' => '',
			),
			array(
				'name' => 'Hotel Entertainment',
				'description' => '',
			),
			array(
				'name' => 'Special Topics in Tourism and Convention Administration',
				'description' => '',
			),
			array(
				'name' => 'Club Food and Beverage Management',
				'description' => '',
			),
			array(
				'name' => 'Club Food and Beverage Management Practicum',
				'description' => '',
			),
			array(
				'name' => 'Catering Operations and Sales',
				'description' => '',
			),
			array(
				'name' => 'Hospitality Marketing I',
				'description' => '',
			),
			array(
				'name' => 'Sales Blitz',
				'description' => '',
			),
			array(
				'name' => 'Sales Blitz Practicum',
				'description' => '',
			),
			array(
				'name' => 'Incentive Travel',
				'description' => '',
			),
			array(
				'name' => 'Meeting Planning',
				'description' => '',
			),
			array(
				'name' => 'Destination Marketing',
				'description' => '',
			),
			array(
				'name' => 'Convention Sales and Service Management',
				'description' => '',
			),
			array(
				'name' => 'Convention Facility Management',
				'description' => '',
			),
			array(
				'name' => 'Fairs and Amusement Park Administration',
				'description' => '',
			),
			array(
				'name' => 'Exposition Service Contracting',
				'description' => '',
			),
			array(
				'name' => 'Exhibit Marketing and Management',
				'description' => '',
			),
			array(
				'name' => 'International Exhibiting and Exposition Management',
				'description' => '',
			),
			array(
				'name' => 'Entertainment and Event Marketing',
				'description' => '',
			),
			array(
				'name' => 'Legal Environment of Meetings and Events',
				'description' => '',
			),
			array(
				'name' => 'Hospitality Financial Management',
				'description' => '',
			),
			array(
				'name' => 'Market and Feasibility Studies',
				'description' => '',
			),
			array(
				'name' => 'Operational Analysis for the Hospitality Industry',
				'description' => '',
			),
			array(
				'name' => 'Sport Tourism',
				'description' => '',
			),
			array(
				'name' => 'Strategic Hospitality Marketing',
				'description' => '',
			),
			array(
				'name' => 'Cruise Ship Administration and Marketing',
				'description' => '',
			),
			array(
				'name' => 'International Tourism',
				'description' => '',
			),
			array(
				'name' => 'Tourism & Convention Internship',
				'description' => '',
			),
			array(
				'name' => 'Club Management Operations',
				'description' => '',
			),
			array(
				'name' => 'Visiting Professor\'s Seminar',
				'description' => '',
			),
			array(
				'name' => 'Sport and Concert Arena Management',
				'description' => '',
			),
			array(
				'name' => 'Hospitality Realty',
				'description' => '',
			),
			array(
				'name' => 'Practicum in Hotel Education',
				'description' => '',
			),
			array(
				'name' => 'Independent Study in Tourism and Convention Management',
				'description' => '',
			),
			array(
				'name' => 'Trade Show Operations',
				'description' => '',
			),
			array(
				'name' => 'Hotel Advertising and Sales Promotions',
				'description' => '',
			),
			array(
				'name' => 'Hotel Marketing II',
				'description' => '',
			),
			array(
				'name' => 'Association Management',
				'description' => '',
			),
			array(
				'name' => 'Special Events Management',
				'description' => '',
			),
			array(
				'name' => 'Meetings and Events Coordination',
				'description' => '',
			),
			array(
				'name' => 'Festival and Event Management',
				'description' => '',
			),
			array(
				'name' => 'Entertainment on the Road',
				'description' => '',
			),
			array(
				'name' => 'Performing Artist Representation and Management',
				'description' => '',
			),
			array(
				'name' => 'Entertainment Production and Operations Management',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Theatre',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Stage Voice',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Acting I',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Playwriting',
				'description' => '',
			),
			array(
				'name' => 'Theatre Practicum',
				'description' => '',
			),
			array(
				'name' => 'Stage Makeup',
				'description' => '',
			),
			array(
				'name' => 'Theatre for Senior Adults',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Gay Plays',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Women Playwrights',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Black Drama and Performance',
				'description' => '',
			),
			array(
				'name' => 'Beginning Singing for Actors',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Musical Theatre Literature',
				'description' => '',
			),
			array(
				'name' => 'Musical Theatre Workshop',
				'description' => '',
			),
			array(
				'name' => 'THTR Play Structure and Analysis I',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Design/Technology',
				'description' => '',
			),
			array(
				'name' => 'Costume Design I',
				'description' => '',
			),
			array(
				'name' => 'Scenic Design I',
				'description' => '',
			),
			array(
				'name' => 'Lighting Design I',
				'description' => '',
			),
			array(
				'name' => 'Theatre Technology I',
				'description' => '',
			),
			array(
				'name' => 'Freshman Performance Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Theatre for Senior Adults: Practical Application',
				'description' => '',
			),
			array(
				'name' => 'Theatre for Senior Adults: Scene Study',
				'description' => '',
			),
			array(
				'name' => 'Voice and Movement for the Actor I',
				'description' => '',
			),
			array(
				'name' => 'Acting: Basic Technique',
				'description' => '',
			),
			array(
				'name' => 'Acting: Camera',
				'description' => '',
			),
			array(
				'name' => 'Staging for the Actor',
				'description' => '',
			),
			array(
				'name' => 'Basic Stage Combat',
				'description' => '',
			),
			array(
				'name' => 'Beginning Improvisation',
				'description' => '',
			),
			array(
				'name' => 'Advanced Acting',
				'description' => '',
			),
			array(
				'name' => 'Sophomore Performance Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Oral History Theatre',
				'description' => '',
			),
			array(
				'name' => 'Voice and Movement for the Actor II',
				'description' => '',
			),
			array(
				'name' => 'Acting Studio II: Technique',
				'description' => '',
			),
			array(
				'name' => 'Speech for the Actor I',
				'description' => '',
			),
			array(
				'name' => 'Intermediate Singing for Actors',
				'description' => '',
			),
			array(
				'name' => 'Advanced Acting for the Camera',
				'description' => '',
			),
			array(
				'name' => 'Acting: Daytime Drama (Soaps)',
				'description' => '',
			),
			array(
				'name' => 'Acting: Commercials',
				'description' => '',
			),
			array(
				'name' => 'Acting: Situation Comedy',
				'description' => '',
			),
			array(
				'name' => 'Movement for the Actor I',
				'description' => '',
			),
			array(
				'name' => 'Acting: Film',
				'description' => '',
			),
			array(
				'name' => 'Acting for the Camera Director II',
				'description' => '',
			),
			array(
				'name' => 'Theatre for Senior Adults: Practicum',
				'description' => '',
			),
			array(
				'name' => 'Stage Management',
				'description' => '',
			),
			array(
				'name' => 'Costume Design II',
				'description' => '',
			),
			array(
				'name' => 'Scenic Design II',
				'description' => '',
			),
			array(
				'name' => 'Lighting Design II',
				'description' => '',
			),
			array(
				'name' => 'Theatre Technology II',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Design and Production',
				'description' => '',
			),
			array(
				'name' => 'CAD for the Theatre',
				'description' => '',
			),
			array(
				'name' => 'Sound Design for the Theatre',
				'description' => '',
			),
			array(
				'name' => 'Theatre Practicum II',
				'description' => '',
			),
			array(
				'name' => 'TV/Film Script Analysis',
				'description' => '',
			),
			array(
				'name' => 'Drama of Today',
				'description' => '',
			),
			array(
				'name' => 'Junior/Senior Voice & Movement Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Junior/Senior Performance Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Gay Plays',
				'description' => '',
			),
			array(
				'name' => 'Women Playwrights',
				'description' => '',
			),
			array(
				'name' => 'Black Drama and Performance',
				'description' => '',
			),
			array(
				'name' => 'Voice and Movement for the Actor III',
				'description' => '',
			),
			array(
				'name' => 'Acting: Scene Study',
				'description' => '',
			),
			array(
				'name' => 'Speech for the Actor II',
				'description' => '',
			),
			array(
				'name' => 'Voice and Movement for the Actor IV',
				'description' => '',
			),
			array(
				'name' => 'Cold Reading for the Actor',
				'description' => '',
			),
			array(
				'name' => 'Casting for the Camera',
				'description' => '',
			),
			array(
				'name' => 'Acting: Voice-over',
				'description' => '',
			),
			array(
				'name' => 'Stage Combat',
				'description' => '',
			),
			array(
				'name' => 'Acting: Improvisation',
				'description' => '',
			),
			array(
				'name' => 'Playwriting',
				'description' => '',
			),
			array(
				'name' => 'Directing Laboratory',
				'description' => '',
			),
			array(
				'name' => 'Play Structure and Analysis II',
				'description' => '',
			),
			array(
				'name' => 'Acting: Audition',
				'description' => '',
			),
			array(
				'name' => 'Acting: Shakespeare',
				'description' => '',
			),
			array(
				'name' => 'Acting: Comedy of Manners',
				'description' => '',
			),
			array(
				'name' => 'Acting: Modern Styles',
				'description' => '',
			),
			array(
				'name' => 'Acting: Musical Theatre',
				'description' => '',
			),
			array(
				'name' => 'Actor/Director Relationship',
				'description' => '',
			),
			array(
				'name' => 'Director/Actor Relationship',
				'description' => '',
			),
			array(
				'name' => 'Stage Management II',
				'description' => '',
			),
			array(
				'name' => 'Theatre History I',
				'description' => '',
			),
			array(
				'name' => 'Theatre History II',
				'description' => '',
			),
			array(
				'name' => 'Period and Style for Theatrical Design and Technology',
				'description' => '',
			),
			array(
				'name' => 'Professional Perspectives',
				'description' => '',
			),
			array(
				'name' => 'AFC Special Topics',
				'description' => '',
			),
			array(
				'name' => 'Acting as a Profession',
				'description' => '',
			),
			array(
				'name' => 'Introduction to Women\'s Studies',
				'description' => '',
			),
			array(
				'name' => 'Gender, Race and Class',
				'description' => '',
			),
			array(
				'name' => 'Feminist Theory',
				'description' => '',
			),
			array(
				'name' => 'Feminist Research Methodology',
				'description' => '',
			),
			array(
				'name' => 'Anthropology of Women',
				'description' => '',
			),
			array(
				'name' => 'Making Gender, Sexuality, and Race',
				'description' => '',
			),
			array(
				'name' => 'Contemporary Asian American Families',
				'description' => '',
			),
			array(
				'name' => 'WMST Gender and Modern British Literature',
				'description' => '',
			),
			array(
				'name' => 'Gender and Social Interaction',
				'description' => '',
			),
			array(
				'name' => 'Sexuality, Literature, and the City',
				'description' => '',
			),
			array(
				'name' => 'Controversies in Gender and Race',
				'description' => '',
			),
			array(
				'name' => 'Chicana Feminism and Experience',
				'description' => '',
			),
			array(
				'name' => 'Gender, Sexuality, and Consumer Culture',
				'description' => '',
			),
			array(
				'name' => 'Gender, Development, and Globalization',
				'description' => '',
			),
			array(
				'name' => 'Feminism and Activism',
				'description' => '',
			),
			array(
				'name' => 'Critical Race Feminism',
				'description' => '',
			),
			array(
				'name' => 'Women in the Performing Arts',
				'description' => '',
			),
			array(
				'name' => 'Bodies, Sex, and Health',
				'description' => '',
			),
			array(
				'name' => 'Women\'s Role in European History, 50-70',
				'description' => '',
			),
			array(
				'name' => 'Special Topics in Gender and History',
				'description' => '',
			),
			array(
				'name' => 'Feminist Praxis',
				'description' => '',
			),
			array(
				'name' => 'Internship in Women\'s Studies',
				'description' => '',
			),
			array(
				'name' => 'Independent Study',
				'description' => '',
			)
		);

		// Run the seeder
		$c = count($classrooms);
		foreach ($classrooms as $i => $classroom)
		{
			echo $i+1 . " / " . $c . " records inserted\r";
			DB::table('classrooms')->insert($classroom);
		}
		echo "\nDone\r\n";
	}

}
