import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Home from "./routes/Home";
import Seat from "./routes/Seat";
import Food from "./routes/Food";

function App() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<Home />}></Route>
        <Route path="menu">
          <Route path="food" element={<Food />}></Route>
        </Route>
      </Routes>
    </Router>
  );
}

export default App;
