export class EcosystemService{
    constructor(API,$log,$q){
        'ngInject';

        //getting all Ecosystems
        this.API = API;
        this.$log = $log;
        this.$q = $q;
        this.ecosystemData = null;

    }


      //getting all ecosystems
    getAll(){
    return  this.API.all('ecosystems').get('');


    }

      //getting one ecosystem
    getOne(id){
        this.API.one('ecosystems',id).get('')
        .then((response)=>{
          this.ecosystemOne = response.data;
          this.$log.log('this is just one ecosystem');
          this.$log.log(this.ecosystemOne);
        });
    }

      //gets organizations of an ecosystem
    getOrganisation(ecosystemId){
        return this.API.one('ecosystems',ecosystemId).one('organizations').get('');
    }

      //this creates a new ecosystem
    create(data){
      this.API.all('ecosystem_parents').post(data).
      then((response)=> {
        this.$log.log(response);
      });
    }

    attachOrganisationToEcosystem(ecosystemId,organisationId){
        let DataAPI = this.API.one('ecosystems',ecosystemId);
          return  DataAPI.all('attach-organizations').post(organisationId);

    }



}
