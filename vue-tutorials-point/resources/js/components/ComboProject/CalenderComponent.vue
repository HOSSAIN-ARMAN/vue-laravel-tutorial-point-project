<template>
<div class="container" id="main-div">
    <div class="d-flex justify-content-center">
        <h2 class="my-2">Vue Calender</h2>

    </div>
    <br>
    <br>
<!--    {{ startDay () }}-->
<!--       <h3>{{ daysInMonth(2021, 10) }}</h3>-->
        <section class="d-flex justify-content-between">
            <h5>{{ currentMonthName }}</h5>
<!--            <h5>{{ currentMonthName() }}</h5>-->
            <h5>{{ currentYear }}</h5>
        </section>
        <section class="d-flex">
            <p style="width:14.28%" class="text-center" v-for="day in days" scope="col"> {{ day }}</p>
        </section>

        <section class="d-flex flex-wrap">
            <p style="width:14.28%" class="text-center my-2" v-for="num in startDay()" >  </p>
<!--            <p style="width:14.28%" class="text-center my-2" v-for="num in daysInMonth(currentYear, currentMonth)" > {{ num }} </p>-->
            <p style="width:14.28%"
               class="text-center my-2"
               v-for="num in daysInMonth()"
               :class = "currentDateClass(num)"> {{ num }} </p>
        </section>

       <section class="d-flex justify-content-between">
           <button class="btn btn-outline-secondary" @click="prev()">previous</button>
           <button class="btn btn-outline-dark" @click="next()">next</button>
       </section>



</div>
</template>

<script>
export default {
name: "CalenderComponent",
    data() {
      return {
          currentDate: new Date().getDay(),
          currentMonth : new Date().getMonth(),
          // currentMonth : new Date().getMonth() + 1,
          // currentMonthName : new Date().toLocaleString('default', {month: 'long'}),
          currentYear : new Date().getFullYear(),
          days : ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
      }
    },
    methods: {
      // daysInMonth (year, month) {
      //     // const month = new Date().getMonth() + 1;
      //     // return new Date(2021, month, 0).getDate();
      //     return new Date(year, month + 1, 0).getDate();
      // },
        daysInMonth () {
            // const month = new Date().getMonth() + 1;
            // return new Date(2021, month, 0).getDate();
            return new Date(this.currentYear, this.currentMonth + 1, 0).getDate();
        },

      startDay () {
          // return new Date(this.currentYear, this.currentMonth - 1, 1).getDay();
          return new Date(this.currentYear, this.currentMonth, 1).getDay();
      },

      next () {
          if (this.currentMonth == 11){
              this.currentMonth = 0;
              this.currentYear++;
          }else {
              this.currentMonth++;
          }

      },

      prev () {
          if(this.currentMonth == 0) {
              this.currentMonth = 11;
              this.currentYear--;
          }
          this.currentMonth--;
      },

        currentDateClass (num) {
           const calenderFullDate = new Date(this.currentYear, this.currentMonth, num).toDateString();
           const currentFullDate = new Date().toDateString();
           return calenderFullDate == currentFullDate ? 'text-danger' : '';
        }
    },

    computed: {
        currentMonthName () {
            return new Date(this.currentYear, this.currentMonth).toLocaleString('default', {month: 'long'});
        }
    }

}
</script>

<style scoped>
#main-div {
    height: 550px;
}
.num {
    width: 25px;
}
</style>
