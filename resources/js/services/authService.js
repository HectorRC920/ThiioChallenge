import axios from "axios";

const authService = async (values) => {
    return await axios.post('/login', values, {
        headers: {
          'Content-Type': 'application/json'
        }
      });
}

export default authService
