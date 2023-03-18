const dating_pages = {};


dating_pages.baseURL = "http://127.0.0.1:8000/api";


// GET API function
dating_pages.getAPI = async (api_url) => {
    try {
    return await axios(api_url);
    } catch (error) {
    dating_pages.Console("Error from GET API", error);
    }
};
    