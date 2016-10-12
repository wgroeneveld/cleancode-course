
describe("period tests", function() {
	// 10/11/2016 -- 30/12/2016
	var period = Object.create(Period, { 
		beginDate: { value: new Date(2016, 10, 10) },
		endDate: { value: new Date(2016, 11, 30) }
	});

	describe("is in period", function() {
		it("should not be in period if less than begin date", function() {
			expect(period.isInPeriod(new Date(2015, 1, 1))).toBe(false);
		});

		it("should not be in period if greater than begin date", function() {
			expect(period.isInPeriod(new Date(2017, 1, 1))).toBe(false);
		});

		it("should be in period if between begin and end date", function() {
			expect(period.isInPeriod(new Date(2016, 10, 20))).toBe(true);
		});
	});

});

