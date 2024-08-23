import axios from "axios";
import { reactive } from "vue";

export function useStats() {
    const stats = reactive({
        autobot_count: 0,
        post_count: 0,
        comment_count: 0,
    })

    const getStats = async () => {
        const response = (await axios.get(`${location.origin}/api/stats`)).data;

        stats.autobot_count = response.autobot_count
        stats.post_count = response.post_count
        stats.comment_count = response.comment_count
    }

    return {
        stats,
        getStats
    }
}
