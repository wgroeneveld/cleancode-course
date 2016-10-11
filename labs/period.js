
Period = (function() {

	var isInPeriod = function(date) {
		return this.beginDate < date && this.endDate > date;
	}

	return {
		isInPeriod: isInPeriod
	};

})();
