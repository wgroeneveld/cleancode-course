class Dierentuin {

	constructor(grootte) {
		this._grootte = grootte;
		this._beschikbareGrootte = grootte;
		this._hokken = [];
	}

	bezoek() {
		return this._hokken;
	}

	ontvangDier(dier) {
		if(dier.grootte <= this._beschikbareGrootte) {
			this._hokken.push(dier);
			this._beschikbareGrootte -= dier.grootte;
		}
	}

	voeder(voeding) {
		return this._hokken.map(function(dier) {
			return dier.grootte;
		}).reduce(function(gr1, gr2) {
			return gr1 + gr2
		}) <= voeding.voedingswaarde;
	}
}
