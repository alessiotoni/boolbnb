<template>
  <div>

    <div class="card bg-light">

      <div class="card-body">

        <form @submit.prevent="filterData">
          <div class="row">
            <text-input label="Città"
            v-model="filters.city">
            </text-input>

            <text-input label="indirizzo"
            v-model="filters.address">
            </text-input>

            <text-input label="N. minimo di stanze"
            v-model="filters.number_rooms">
            </text-input>

            <text-input label="N. minimo di letti"
            v-model="filters.number_beds">
            </text-input>

            <range-input label="Distanza"
            v-model="filters.distance">
            </range-input>

            <div>
              <multi-check-input label="Servizi"
                :items="servicesList"
                v-model="filters.services">
              </multi-check-input>
            </div>
           

            <!-- <div v-for="service in services" :key="service.city">
              <label :for="service.city">
                {{ service.title }}
                <input type="checkbox"
                v-model="filters.services" :value="service.id" :name="service.city" :id="service.city">
              </label>
            </div> -->
          </div>

          <div>
            <!-- <input type="button" value="FILTRA" @click="callAccomodation()"> -->
            <button type="submit" class="btn btn-primary">filtra</button>
            <button type="reset" class="btn btn-primary">annulla filtri</button>

          </div>
        </form>

      </div>
    </div>

    <div class="row">
      <div class="col-4">
        <div class="card" style="width: 100%"
        v-for="accomodation in filteredAccomodation"
        :key="accomodation.id">

          <div class="card-body">
            <h5 class="card-title">{{ accomodation.title }}</h5>
            <p class="card-text">{{ accomodation.description }}</p>
            <a :href="accomodation.link" class="card-link">Visualizza</a>
          </div>

        </div>
      </div>

      <div class="col-8">
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "AccomodationIndex",
  data() {
    return {
      originalAccomodation: [],
      filteredAccomodation: [],
      servicesList: [],
      filters: {
        city: null,
        address: null,
        number_rooms: null,
        number_beds: null,
        distance: null,
        services: null, 
      }
      // urlGetPosition: "https://api.tomtom.com/search/2/geocode/" + accomodation.province + "%20" + accomodation.city + "%20" + accomodation.type_street + "%20" + accomodation.street_name + "%20" + accomodation.building_number + ".json?Key=t4QufcKAvdkiBeKqaOB5kwMYk71Rx8b6",
    };
  },
  methods: {
    // callAccomodation() {
    //   axios.get("/api/accomodation", {
    //           params: this.filters
              
    //         })
    //         .then(resp => {
    //           this.originalAccomodation = resp.data.results;
    //           this.filteredAccomodation = resp.data.results;
    //           console.log(this.filters.services)
    //         })
    //         .catch(er => console.log(er));
    // },
    callMap() {
      this.originalAccomodation.forEach(accomodation => {
      var compactStreetName = accomodation.street_name.replace(/\s/g, '');

      var urlGetPosition = "https://boolbnbproxy.herokuapp.com/https://api.tomtom.com/search/2/geocode/" + accomodation.province + "%20" + accomodation.city + "%20" + accomodation.type_street + "%20" + compactStreetName + "%20" + accomodation.building_number + ".json?Key=t4QufcKAvdkiBeKqaOB5kwMYk71Rx8b6";

       axios
        .get(urlGetPosition)
        .then((resp) => {

          // this.z.push(resp.data.results.position);
         console.log(resp)
        })
        .catch((er) => {
          console.log(er)
        });

      });
    },
    // callServices() {
    //   axios.get("/api/services")
    //       .then(resp => {
    //         this.services = resp.data.results;
    //       });
    // }
    filterData() {
      axios.get("/api/accomodation/filter", {
        params: this.filters
      })
      .then(resp => {
        this.filteredAccomodation = resp.data.results;
      })
      .catch (er => {
        console.error(er);
        alert("errore")
      });
    }
  },
  mounted() {
    // this.callAccomodation();
    // this.callServices();
    this.callMap();

    axios.get("/api/accomodation")
    .then(resp => {
        this.originalAccomodation = resp.data.results.data;
        this.filteredAccomodation = resp.data.results.data;
    })
    .catch(er => {
      console.error(er);
    });
    axios.get("/api/services")
    .then(resp => {
      this.servicesList = resp.data.results;
    })
    .catch(er => {
      console.error(er);
    });
  }
};
</script>
