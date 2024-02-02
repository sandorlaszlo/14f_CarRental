# Autókölcsönző

## Adatbázis
```/database/CarRental.sql```

# Készítsen back-end alkalmazást, amely az alábbi függvényeket tartalmazza:

1. Összes kölcsönzés
  Method: GET
  URL: /api/rentals
  Reponse: [
              {
				 id: 0,
				 carId: 0,
				 licenseNumber: 'HU ABC-123',
				 customerName: 'Teszt Elek',
				 fromDate: '2020.03.07',
				 days: 4,
				 pricePerDay: 35000,
				 abroad: true
			  },
			  {
				...
			  }
		      ...
           ]
  
2. A válasz azokat a kölcsönzéseket adja eredményül, ami az URL-ben lévő dátum után történt.
  Method: GET
  URL: /api/rentals/2020.03.07
  Response: ua. mint fent
  

3. A Body-ban kapott rekordot rögzíti az adatbázisban.
  Method: POST
  URL: /api/rentals
  Body: {
			carId: 1,
			customerName: 'Teszt Elek',
			fromDate: '2020.03.07',
			days: 4,
			pricePerDay: 35000,
			abroad: true
        }
  Response: {
				id: 201
				carId: 1,
				customerName: 'Teszt Elek',
				fromDate: '2020.03.07',
				days: 4,
				pricePerDay: 35000,
				abroad: true
            }
  
  Ha a dátum kisebb, mint a mai nap, akkor a fv adjon vissza 422-es error "Hibás dátum" üzenettel
  {
	  error = "Hibás dátum"
  }