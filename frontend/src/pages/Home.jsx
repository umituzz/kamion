import { Dropdown, InputGroup, Row, FormControl, DropdownButton, Container, Button, ButtonGroup } from "react-bootstrap";
import { ArrowLeftSquareFill, ArrowRightSquareFill } from "react-bootstrap-icons";
import Sidebar from "../components/Sidebar";
import { useEffect, useState } from "react";
import { useAuth } from "../contexts/AuthContext";
import Loading from "../components/Loading";

function Home() {
    // const { loginStorageData } = useAuth();
    // const [searchValue, setSearchValue] = useState("");
    // const [orderBy, setOrderBy] = useState("desc");
    // const [selectedDate, setSelectedDate] = useState("");
    // const [selectedSources, setSelectedSources] = useState([]);
    // const [selectedCategory, setSelectedCategory] = useState([]);
    // const [pageNo, setPageNo] = useState(1);
    // const [articlesShow, setArticlesShow] = useState([]);
    // const userId = loginStorageData.user.id;
    //
    // const api = `http://localhost/api/articles?s=${searchValue}&sort=${orderBy}&date=${selectedDate}&category=${selectedCategory}&source=${selectedSources}&page=${pageNo}&user=${userId}`;
    //
    // const { articles, lastPage, loading } = useArticleList(api);
    //
    // useEffect(() => {
    //     setArticlesShow([...articles]);
    // }, [articles]);
    //
    // const handleSources = (value) => {
    //     setSelectedSources(value);
    // };
    //
    // const handleDate = (value) => {
    //     setSelectedDate(value);
    // };
    // const handleCategory = (value) => {
    //     setSelectedCategory(value);
    // };
    // const handlePagination = (event) => {
    //     const status = event.target.id;
    //     if (status === "next") {
    //         setPageNo(pageNo + 1);
    //     } else if (status === "prev") {
    //         setPageNo(pageNo - 1);
    //     } else if (status === "last") {
    //         setPageNo(lastPage);
    //     } else if (status === "first") {
    //         setPageNo(1);
    //     } else {
    //         setPageNo(pageNo);
    //     }
    // };

    return (
        <Container className="mt-2 minHeight">
            test
        </Container>
    );
}

export default Home;
