import axios from "axios";

export const ServiceClient = axios.create({
    withCredentials: true,
    baseURL: 'http://localhost/api'
});

/*
 * Request interceptor
 */
ServiceClient.interceptors.request.use(
    (request) => {
        request.headers.common.Accept = 'application/json';
        return request;
    }
)

export default {
    async getAllForms() {
        try {
          const response = await ServiceClient.get('/form');
          return response.data.data;
        } catch (error) {
          console.error(error);
        }
    },

    async getForm(id) {
      try {
        const response = await ServiceClient.get('/form/' + id);
        return response.data.data;
      } catch (error) {
        console.error(error);
      }
    },

    async createForm(payload) {
        try {
          const response = await ServiceClient.post('/form', payload);
          return response.data;
        } catch (error) {
          console.error(error);
        }
    },

    async updateForm(payload) {
        try {
          const response = await ServiceClient.put('/form', payload);
          return response.data.data;
        } catch (error) {
          console.error(error);
        }
    },

    async deleteForm(id) {
        try {
          const response = await ServiceClient.delete('/form/'+ id);
          return response.data;
        } catch (error) {
          console.error(error);
        }
    },

    async getFieldTypes() {
      try {
        const response = await ServiceClient.get('/field-type');
        return response.data.data;
      } catch (error) {
        console.error(error);
      }
  }
}