import { Col } from "react-bootstrap";
import Table from "react-bootstrap/Table";

const Order = ({ orders }) => {
	return (
		<Col md={12}>
			<Table responsive>
				<thead>
				<tr>
					<th>#</th>
					<th>Load Type</th>
					<th>commodity</th>
					<th>departure_city</th>
					<th>arrival_city</th>
					<th>created_at</th>
				</tr>
				</thead>
				<tbody>
				{orders.map((order) => {
					return (
						<tr key={order.id}>
							<td>{order.id}</td>
							<td>{order.load_type}</td>
							<td>{order.commodity}</td>
							<td>{order.departure_city}</td>
							<td>{order.arrival_city}</td>
							<td>{order.created_at}</td>
						</tr>
					)
				})}
				</tbody>
			</Table>
		</Col>
	);
};

export default Order;
