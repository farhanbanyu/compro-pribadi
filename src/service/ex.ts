import api from "./api";

export const getEx = async () => {
    const response = await api.get("/home");

    return response.data;
};