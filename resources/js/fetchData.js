export const fetchData = async (url, params) => {
    const urlSearchParams = new URLSearchParams(params);

    const response = axios.get(`${url}?${urlSearchParams}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    });

    const { data } = await response;
    return data;
}
