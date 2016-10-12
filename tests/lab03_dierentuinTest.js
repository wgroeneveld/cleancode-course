
describe("dierentuin tests", function() {

	var tuin;

	beforeEach(function() {
		tuin = Dierentuin(40);
	});

	describe("dieren ontvangen in de dierentuin", function() {
		it("should ontvang dier when dierentuin groot genoeg", function() {
			var nieuwDier = { grootte: 20 };
			tuin.ontvangDier(nieuwDier);

			expect(tuin.bezoek()).toContain(nieuwDier);
		});

		it("should not be able to ontvang dier when dierentuin niet groot genoeg", function() {
			var teGrootDier = { grootte: 100 };
			tuin.ontvangDier(teGrootDier);

			expect(tuin.bezoek()).not.toContain(teGrootDier);
		});

		it("should ontvang twee kleine dieren", function() {
			var kleinDier1 = { grootte: 10 };
			var kleinDier2 = { grootte: 15 };

			tuin.ontvangDier(kleinDier1);
			tuin.ontvangDier(kleinDier2);

			expect(tuin.bezoek()).toContain(kleinDier1);
			expect(tuin.bezoek()).toContain(kleinDier2);
		});
	});

	describe("dieren voederen", function() {
		it("should voeder alle dieren met exact genoeg voeding", function() {
			tuin.ontvangDier({ grootte: 10});
			tuin.ontvangDier({ grootte: 15});

			var gevoederd = tuin.voeder({ voedingswaarde: 25 });
			expect(gevoederd).toBe(true);
		});

		it("should voeder alle dieren met te veel voeding", function() {
			tuin.ontvangDier({ grootte: 10});
			tuin.ontvangDier({ grootte: 15});

			var gevoederd = tuin.voeder({ voedingswaarde: 100 });
			expect(gevoederd).toBe(true);
		});

		it("should voeder alle dieren met te weinig voeding resulteert in ongemak", function() {
			tuin.ontvangDier({ grootte: 10});
			tuin.ontvangDier({ grootte: 15});

			var gevoederd = tuin.voeder({ voedingswaarde: 10 });
			expect(gevoederd).toBe(false);
		});

	});

});