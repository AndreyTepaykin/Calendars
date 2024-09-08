/**
 * Autogenerated base class for the Calendars model.
 * 
 * Don't change this file, since it can be overwritten.
 * Instead, change the Calendars.js file.
 *
 * @module Calendars
 */
var Q = require('Q');
var Db = Q.require('Db');

/**
 * Base class for the Calendars model
 * @namespace Base
 * @class Calendars
 * @static
 */
function Base () {
	return this;
}
 
module.exports = Base;

/**
 * The list of model classes
 * @property tableClasses
 * @type array
 */
Base.tableClasses = [
	"Calendars_Event"
];

/**
 * This method calls Db.connect() using information stored in the configuration.
 * If this has already been called, then the same db object is returned.
 * @method db
 * @return {Db} The database connection
 */
Base.db = function () {
	return Db.connect('Calendars');
};

/**
 * The connection name for the class
 * @method connectionName
 * @return {string} The name of the connection
 */
Base.connectionName = function() {
	return 'Calendars';
};

/**
 * Link to Calendars.Event model
 * @property Event
 * @type Calendars.Event
 */
Base.Event = Q.require('Calendars/Event');
