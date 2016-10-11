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

	var voeder = function() {

	};

	return {
		bezoek: bezoek,
		ontvangDier: ontvangDier,
		voeder: voeder
	}

});