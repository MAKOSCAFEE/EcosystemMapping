class CreateEventController {
    constructor(EventService, $log, OrganizationService, $localStorage, $state, EcosystemService, $rootScope, $filter, $timeout, $q) {
        'ngInject';

        // Initializing services
        this.organisationService = OrganizationService;
        this.ecosystemService = EcosystemService;
        this.eventService = EventService;
        this.$localStorage = $localStorage;
        this.$rootScope = $rootScope;
        this.$state = $state;
        this.$log = $log;
        this.$filter = $filter;
        this.$q = $q;
        this.$timeout = $timeout;

        // list of `state` value/display objects
        this.states = this.allOrganisations;
        this.selectedItem = null;
        this.searchText = null;
    }

    // adds an event to the database
    addEvent() {
        let data = this.makeEvent;
        let selectedOrg = this.selectedItem;
        let modifiedEvent = {
            name: this.makeEvent.event.name,
            description: this.makeEvent.event.description,
            venue: this.makeEvent.event.venue,
            free_or_paid: this.makeEvent.event.free_or_paid,
            start_date: this._filterDate(this.makeEvent.event.start_date),
            end_date: this._filterDate(this.makeEvent.event.end_date)

        };
        this.$log.log(modifiedEvent);

        this.eventService.createEvent(modifiedEvent).then((response) => {
            this.attachId = {
                event_id: response.data.id
            };
            this.eventId = response.data.id;
            this.$log.log(response.data);
            this.$log.log("an event was created successfully");
            this.eventService.attachEvent(selectedOrg.id, this.attachId).then((response) => {
                this.$log.log("event attached succefully");

                this.ecosystemService.getOrganisation(this.$localStorage.ecosystem.id).then((response) => {
                    this.$localStorage.organisations = response.data;
                    this.$rootScope.$emit('newEvent', 'stop change of state');
                });

            });

        });
    }

    // adds a new location to the database
    addLocation(data) {
        return this.organisationService.createLocation(data);
    }

    // displays status for event payment
    displayFreePaid() {}

    // display organisations
    displayOrganisations() {
        this.organisationService.getByEcosystem(this.$localStorage.ecosystem.id).then((response) => {
            this.allOrganisations = response.data.data;
            this.$log.log("organisations retrived successfully");
        });

    }

    saveChanges() {
        //console.log(this.dateTime);
    }

    _filterDate(dateValue) {
        let new_date = this.$filter('date')(new Date(dateValue), 'yyyy-MM-dd HH:mm:ss');

        return new_date;
    }

    querySearch(query) {
        let results = query
            ? this.allOrganisations.filter(this.createFilterFor(query))
            : this.allOrganisations;
        let deferred = this.$q.defer();
        this.$timeout(() => {
            deferred.resolve(results);
        }, Math.random() * 1000, false);
        return deferred.promise;
    }

    /**
    * Create filter function for a query string
    */
    createFilterFor(query) {
        var lowercaseQuery = angular.lowercase(query);

        return (state) => {
            let _state_name_lower_case = angular.lowercase(state.name);
            return (_state_name_lower_case.indexOf(lowercaseQuery) === 0);
        };
    }

    selectedItemChange(item) {
      this.selectedItem = item;
    }


    $onInit() {
        this.displayOrganisations();
    }
}

export const CreateEventComponent = {
    templateUrl: './views/app/components/create-event/create-event.component.html',
    controller: CreateEventController,
    controllerAs: 'vm',
    bindings: {}
}
