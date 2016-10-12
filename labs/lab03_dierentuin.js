Dierentuin = (function(grootte) {

	var hokken = [];
	var beschikbareGrootte = grootte;

	var bezoek = function() {
		return hokken;
	};

	var ontvangDier = function(dier) {
		if(dier.grootte <= beschikbareGrootte) {
			hokken.push(dier);
			beschikbareGrootte -= dier.grootte;
		}
	};

	var voeder = function(voeding) {
		return hokken.map(function(dier) {
			return dier.grootte;
		}).reduce(function(gr1, gr2) {
			return gr1 + gr2
		}) <= voeding.voedingswaarde;
	};

	return {
		bezoek: bezoek,
		ontvangDier: ontvangDier,
		voeder: voeder
	}

});