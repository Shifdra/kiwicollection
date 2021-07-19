<template>
  <div class="container py-3">
    <h1 class="text-center">Hello World</h1>

    <select v-model="filterCol" @change="filterColumn()">
      <option value="" disabled>Filter Column</option>
      <option value="firstName">First Name</option>
      <option value="lastName">Last Name</option>
      <option value="streetAddress">Street Address</option>
    </select>
    <input v-model="filterVal" @keyup="filterColumn()" type="text">

    <table class="table">
      <thead>
      <tr>
        <th @click="sortColumn('firstName')">First Name</th>
        <th @click="sortColumn('lastName')">Last Name</th>
        <th @click="sortColumn('streetAddress')">Street Address</th>
        <th>Phone Number(s)</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="record in records" :key="record.id">
        <td>{{ record.firstName }}</td>
        <td>{{ record.lastName }}</td>
        <td>{{ record.streetAddress }}</td>
        <td>
          <div v-for="phone in record.phoneNumbers">
            {{ phone.number }}<span> ({{ phone.type }})</span>
          </div>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: "app",
  props: {
    data: Array,
  },
  data() {
    return {
      records: this.data,
      filterVal: "",
      filterCol: ""
    }
  },
  methods: {
    sortColumn(fieldName) {
      this.records = this.data.sort((a, b) => {
        let fieldA = a[fieldName];
        let fieldB = b[fieldName];

        //comparison field can be null (I want these records pushed to the bottom)
        if (!fieldA)
          return 0;

        return fieldA > fieldB ? 1 : -1;
      });
    },
    filterColumn() {
      this.records = this.data.filter(a => {
        //The value to be filtered by is driven by the textbox
        const filterValue = this.filterVal.toLowerCase();

        //Only want to run the filter when there is a value entered
        //A column to be filtered by must also be selected
        if (filterValue === "" && this.filterCol)
          return true;

        //sometimes record value will be empty/null -> return false to exclude from results
        return a[this.filterCol] ? a[this.filterCol].toLowerCase().includes(filterValue) : false;
      });
    }
  },
}
</script>

<style scoped>

</style>
